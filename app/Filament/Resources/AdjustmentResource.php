<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdjustmentResource\Pages;
use App\Filament\Resources\AdjustmentResource\RelationManagers;
use App\Filament\Resources\AdjustmentResource\RelationManagers\ProductsRelationManager;
use App\Models\Adjustment;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;

class AdjustmentResource extends Resource
{
    protected static ?string $model = Adjustment::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->latest();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(6)
                    ->schema([
                        Forms\Components\Select::make('warehouse_id')
                            ->relationship('warehouse', 'name')
                            ->required()
                            ->columnSpan(3)
                            ->label('Warehouse'),

                        Forms\Components\Select::make('products')
                            ->relationship('products', 'name')
                            ->required()
                            ->multiple()
                            ->preload()
                            ->columnSpan(3)
                            ->label('Products'),
                    ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Warehouse Details')
                    ->schema([
                        Group::make([
                            TextEntry::make('warehouse.name')
                                ->label('Warehouse')
                                ->columnSpanFull(),

                            TextEntry::make('tracking_number')
                                ->label('Tracking Number')
                                ->columnSpanFull(),
                        ])->columnSpan('full'),
                    ])
                    ->collapsible(),

                Section::make('Additional Information')
                    ->schema([
                        Group::make([
                            TextEntry::make('created_at')
                                ->label('Date')
                                ->since()
                                ->columnSpanFull(),

                            TextEntry::make('product_count')
                                ->label('Products')
                                ->columnSpanFull(),
                        ])->columnSpan('full'),
                    ])
                    ->collapsible(),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tracking_number')
                    ->label('Tracking Number'),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->label('Date'),
                Tables\Columns\TextColumn::make('warehouse.name')
                    ->label('Warehouse'),
                Tables\Columns\TextColumn::make('product_count')
                    ->label('Products'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            ProductsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdjustments::route('/'),
            'create' => Pages\CreateAdjustment::route('/create'),
            'edit' => Pages\EditAdjustment::route('/{record}/edit'),
            'view' => Pages\ViewAdjustment::route('/{record}/show'),
        ];
    }
}
