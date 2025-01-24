<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleReturnResource\Pages;
use App\Filament\Resources\SaleReturnResource\RelationManagers;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Blade;

class SaleReturnResource extends Resource
{
    protected static ?string $model = Sale::class;

    protected static ?string $navigationGroup = 'Manage Sales';

    public static ?string $label = 'Sales Return';

    protected static ?string $navigationIcon = 'heroicon-o-stop-circle';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('is_returned', true)
            ->latest();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Customer & Warehouse Information')->schema([
                    Forms\Components\Grid::make(6)
                        ->schema([
                            Forms\Components\DatePicker::make('date')
                                ->columnSpan(3)
                                ->required(),
                            Forms\Components\Select::make('customer_id')
                                ->relationship('customer', 'first_name')
                                ->columnSpan(3)
                                ->live()
                                ->required(),
                            Forms\Components\Select::make('warehouse_id')
                                ->relationship('warehouse', 'name')
                                ->columnSpan(3)
                                ->required(),
                        ]),
                ]),
                Forms\Components\Section::make('Financial Details')
                    ->schema([
                        Forms\Components\Grid::make(6)
                            ->schema([
                                Forms\Components\TextInput::make('total_amount')
                                    ->columnSpan(3)
                                    ->numeric()
                                    ->minValue(1)
                                    ->live()
                                    ->required(),
                                Forms\Components\Select::make('discount')
                                    ->options(array_combine(range(1, 30), range(1, 30)))
                                    ->columnSpan(3)
                                    ->required()
                                    ->label('Discount (%)')
                                    ->afterStateUpdated(
                                        function ($state, Get $get, Set $set) {
                                            $state = round(($state / 100) * $get('total_amount'));
                                            $set('receivable', round($get('total_amount') - $state));
                                        }
                                    )
                                    ->live(),
                                Forms\Components\TextInput::make('receivable')
                                    ->columnSpan(3)
                                    ->numeric()
                                    ->minValue(1)
                                    ->maxValue(function (Get $get) {
                                        $discount = round(($get('discount') / 100) * $get('total_amount'));
                                        return round($get('total_amount') - $discount);
                                    })
                                    ->afterStateUpdated(function (Set $set, Get $get, $state) {
                                        $discount = round(($get('discount') / 100) * $get('total_amount'));
                                        $set('due', round($get('receivable') - $get('received')));

                                        if ($state > round($get('total_amount') - $discount)) {
                                            $set('receivable', round($get('total_amount') - $discount));
                                        }
                                    })
                                    ->live()
                                    ->required(),
                                Forms\Components\TextInput::make('received')
                                    ->label('Received (An amount you have to pay now)')
                                    ->columnSpan(3)
                                    ->numeric()
                                    ->minValue(0)
                                    ->afterStateUpdated(function (Set $set, Get $get, $state) {
                                        $value = round($get('receivable') - $get('received'));
                                        if ($value < 0) $value = 0;
                                        $set('due', $value);

                                        if ($state > $get('receivable')) $set('amount', $get('receivable'));
                                    })
                                    ->live(),
                                Forms\Components\TextInput::make('due')
                                    ->label('Due (An amount you will need to balance up)')
                                    ->columnSpan(3)
                                    ->readOnly()
                                    ->numeric()
                                    ->minValue(0)
                                    ->live()
                                    ->required(),
                            ]),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('invoice_number')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->wrap()
                    ->date()
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer.name')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('warehouse.name')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->wrap()
                    ->money('USD'),
                Tables\Columns\TextColumn::make('receivable')
                    ->wrap()
                    ->money('USD'),
                Tables\Columns\TextColumn::make('received')
                    ->wrap()
                    ->money('USD'),
                Tables\Columns\TextColumn::make('due')
                    ->wrap(),
                Tables\Columns\IconColumn::make('is_paid')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
            ])
            ->filters([
                Filter::make('is_paid')
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('pdf')
                        ->label('PDF')
                        ->color('success')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->action(function ($record) {
                            return response()->streamDownload(function () use ($record) {
                                echo Pdf::loadHtml(
                                    Blade::render('sale-pdf', ['record' => $record])
                                )->stream();
                            }, $record->number . '.pdf', ['Content-Type' => 'application/pdf']);
                        }),
                    Tables\Actions\Action::make('payment')
                        ->label('Recieve Payment')
                        ->icon('heroicon-o-credit-card')
                        ->color('warning')
                        ->form(fn($record) => [
                            Forms\Components\TextInput::make('due')
                                ->label("Due (An amount you will need to balance up). $$record->due")
                                ->columnSpanFull()
                                ->numeric()
                                ->prefix('$')
                                ->minValue(0)
                                ->required()
                                ->maxValue($record->due),
                        ])
                        ->action(function (Sale $record, array $data) {
                            $balance = $record->due - abs($data['due']);
                            if ($balance <= 0) {
                                $record->update(['due' => 0, 'is_paid' => true]);
                            } else {
                                $record->update(['due' => $balance, 'is_paid' => false]);
                            }
                            Notification::make()
                                ->title('Payment Successfully')
                                ->success()
                                ->send();
                        })
                        ->visible(fn($record) => $record->due > 0)
                ])
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSaleReturns::route('/'),
            'create' => Pages\CreateSaleReturn::route('/create'),
            'edit' => Pages\EditSaleReturn::route('/{record}/edit'),
        ];
    }
}
