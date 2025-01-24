<?php

namespace App\Filament\Resources\AdjustmentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description')
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
            ->headerActions([])
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
