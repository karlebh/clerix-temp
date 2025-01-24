<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransferResource\Pages;
use App\Filament\Resources\TransferResource\RelationManagers;
use App\Models\Product;
use App\Models\Transfer;
use App\Models\Warehouse;
use Doctrine\DBAL\Driver\Mysqli\Initializer\Options;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransferResource extends Resource
{
    protected static ?string $model = Transfer::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-trending-up';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->latest();
    }

    public static function form(Form $form): Form
    {
        $warehouses = Warehouse::all()->pluck('name', 'name');

        return $form
            ->schema([
                Forms\Components\Grid::make(6)->schema([
                    Forms\Components\Select::make('from_location')
                        ->label('From Warehouse')
                        ->options($warehouses)
                        ->columnSpan(3)
                        ->required(),
                    Forms\Components\Select::make('to_location')
                        ->label('To Warehouse')
                        ->options($warehouses)
                        ->columnSpan(3)
                        ->required(),
                    Forms\Components\Select::make('products')
                        ->required()
                        ->columnSpanFull()
                        ->multiple()
                        ->preload()
                        ->relationship('products', 'name'),
                    Forms\Components\TextInput::make('note')
                        ->columnSpan(3),
                    Forms\Components\DatePicker::make('date')
                        ->columnSpan(3)
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tracking_number')
                    ->label('Tracking No.')
                    ->sortable()
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('from_location')
                    ->label('From')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('to_location')
                    ->label('To')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('product_count')
                    ->label('Products')
                    ->limit(30),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([]),
            ]);
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
            'index' => Pages\ListTransfers::route('/'),
            'create' => Pages\CreateTransfer::route('/create'),
            'edit' => Pages\EditTransfer::route('/{record}/edit'),
        ];
    }
}
