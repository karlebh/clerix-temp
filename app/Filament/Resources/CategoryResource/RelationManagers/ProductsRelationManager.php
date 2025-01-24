<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->columnSpanFull()
                    ->label('Product Name'),

                Forms\Components\RichEditor::make('description')
                    ->nullable()
                    ->columnSpanFull()
                    ->label('Description'),

                Forms\Components\TextInput::make('price')
                    ->prefix("USD")
                    ->required()
                    ->numeric()
                    ->columnSpanFull()
                    ->minValue(0)
                    ->label('Price'),

                Forms\Components\TextInput::make('stock')
                    ->required()
                    ->integer()
                    ->default(0)
                    ->minValue(1)
                    ->columnSpanFull()
                    ->label('Stock'),

                Forms\Components\Select::make('unit_id')
                    ->relationship('unit', 'name')
                    ->required()
                    ->columnSpanFull()
                    ->label('Unit'),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->columnSpanFull()
                    ->required()
                    ->label('Category'),

                Forms\Components\Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->columnSpanFull()
                    ->required()
                    ->label('Brand'),

                Forms\Components\Select::make('supplier_id')
                    ->relationship('supplier', 'name')
                    ->columnSpanFull()
                    ->required()
                    ->label('Supplier'),
            ]);
    }


    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description')
                    ->formatStateUsing(
                        fn($state) => strip_tags($state)
                    )
                    ->wrap(),
                Tables\Columns\TextColumn::make('category.name')
                    ->wrap(),
                Tables\Columns\TextColumn::make('price')
                    ->prefix('$')
                    ->wrap(),
                Tables\Columns\TextColumn::make('stock')
                    ->formatStateUsing(function ($state, $record) {
                        return $state > 1 ? $state . " " . str()->plural($record->unit) : $state . " " . $record->unit;
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->wrap(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('View')
                        ->icon('heroicon-o-eye')
                        ->color('primary')
                        ->url(fn($record) => route('filament.admin.resources.products.view', $record))
                        ->openUrlInNewTab(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
