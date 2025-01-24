<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Supplier;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $label = 'Manage Suppliers';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->latest();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(6)->schema([
                    Forms\Components\TextInput::make('name')
                        ->columnSpanFull()
                        ->required()
                        ->columnSpan(3)
                        ->label('Name'),

                    Forms\Components\TextInput::make('mobile')
                        ->columnSpanFull()
                        ->columnSpan(3)
                        ->label('Mobile'),

                    Forms\Components\TextInput::make('email')
                        ->columnSpanFull()
                        ->email()
                        ->label('Email'),

                    Forms\Components\TextInput::make('payable')
                        ->columnSpanFull()
                        ->numeric()
                        ->label('Payable')
                        ->columnSpan(3)
                        ->minValue(0)
                        ->default(0),

                    Forms\Components\TextInput::make('receivable')
                        ->columnSpanFull()
                        ->numeric()
                        ->minValue(0)
                        ->columnSpan(3)
                        ->label('Receivable')
                        ->default(0),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('mobile'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('payable')
                    ->formatStateUsing(fn($state) => '$' . number_format($state, 2)),
                Tables\Columns\TextColumn::make('receivable')
                    ->formatStateUsing(fn($state) => '$' . number_format($state, 2)),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make("Clear Payment")
                        ->action(function ($record) {

                            $amount = $record->payable + $record->receivable;
                            $record->update(['payable' => $amount, 'receivable' => 0]);

                            Notification::make()
                                ->title('Payment Cleared Successfully')
                                ->success()
                                ->send();
                        })
                        ->color('success')
                        ->icon('heroicon-o-credit-card')
                        ->visible(fn($record) => $record->receivable > 0),
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }
}
