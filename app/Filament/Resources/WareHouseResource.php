<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WareHouseResource\Pages;
use App\Filament\Resources\WareHouseResource\RelationManagers;
use App\Models\WareHouse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WareHouseResource extends Resource
{
    protected static ?string $model = WareHouse::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $label = 'Manage Warehouses';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->latest();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->columnSpanFull()
                    ->unique(ignoreRecord: true),
                Forms\Components\RichEditor::make('address')
                    ->required()
                    ->columnSpanFull()
                    ->nullable(),
                Forms\Components\TextInput::make('stock')
                    ->numeric()
                    ->minValue(1)
                    ->required()
                    ->columnSpanFull()
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->limit(50),
                Tables\Columns\TextColumn::make('stock')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListWareHouses::route('/'),
            // 'create' => Pages\CreateWareHouse::route('/create'),
            'edit' => Pages\EditWareHouse::route('/{record}/edit'),
        ];
    }
}
