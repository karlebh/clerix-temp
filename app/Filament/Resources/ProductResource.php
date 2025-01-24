<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationGroup = 'Manage Products';

    protected static ?string $navigationIcon = 'heroicon-o-stop-circle';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->orderBy('created_at', 'DESC')
            ->orderBy('updated_at', 'DESC');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Product Information')
                    ->schema([
                        Forms\Components\Grid::make(6)->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->columnSpan(3)
                                ->label('Product Name'),

                            Forms\Components\TextInput::make('price')
                                ->prefix("USD")
                                ->required()
                                ->numeric()
                                ->columnSpan(3)
                                ->minValue(0)
                                ->label('Price'),

                            Forms\Components\RichEditor::make('description')
                                ->nullable()
                                ->columnSpanFull()
                                ->label('Description'),
                        ]),

                        Forms\Components\Grid::make(6)->schema([
                            Forms\Components\TextInput::make('stock')
                                ->required()
                                ->integer()
                                ->default(0)
                                ->minValue(1)
                                ->columnSpan(3)
                                ->label('Stock'),

                            Forms\Components\Select::make('unit_id')
                                ->relationship('unit', 'name')
                                ->required()
                                ->columnSpan(3)
                                ->label('Unit'),

                            Forms\Components\Select::make('category_id')
                                ->relationship('category', 'name')
                                ->columnSpan(3)
                                ->required()
                                ->label('Category'),

                            Forms\Components\Select::make('brand_id')
                                ->relationship('brand', 'name')
                                ->columnSpan(3)
                                ->required()
                                ->label('Brand'),

                            Forms\Components\Select::make('supplier_id')
                                ->relationship('supplier', 'name')
                                ->columnSpan(3)
                                ->required()
                                ->label('Supplier'),
                        ]),
                    ]),
            ]);
    }


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Product Details')
                    ->schema([
                        TextEntry::make('sku')
                            ->label('SKU')
                            ->columnSpanFull(),

                        TextEntry::make('name')
                            ->label('Product Name')
                            ->columnSpanFull(),

                        TextEntry::make('category.name')
                            ->label('Category')
                            ->columnSpanFull(),

                        TextEntry::make('supplier.name')
                            ->label('Supplier')
                            ->columnSpanFull(),
                    ]),

                Section::make('Pricing and Stock')
                    ->schema([
                        TextEntry::make('price')
                            ->label('Price')
                            // ->formatStateUsing(fn($state) => money_format($state))
                            ->columnSpanFull(),

                        TextEntry::make('stock')
                            ->label('Stock')
                            ->columnSpanFull(),

                        TextEntry::make('unit.name')
                            ->label('Unit')
                            ->columnSpanFull(),
                    ]),

                Section::make('Additional Information')
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Created At')
                            ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->diffForHumans())
                            ->columnSpanFull(),
                    ])
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU'),
                Tables\Columns\TextColumn::make('name')
                    ->wrap()
                    ->label('Product Name'),
                Tables\Columns\TextColumn::make('category.name')
                    ->wrap()
                    ->label('Category'),
                Tables\Columns\TextColumn::make('supplier.name')
                    ->wrap()
                    ->label('Supplier'),
                Tables\Columns\TextColumn::make('price')
                    ->money("USD")
                    ->label('Price'),
                Tables\Columns\TextColumn::make('stock')
                    ->label('Stock'),
                Tables\Columns\TextColumn::make('unit.name')
                    ->wrap(),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->dateTime(),
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
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
            'view' => Pages\ViewProduct::route('/{record}/view'),
        ];
    }
}
