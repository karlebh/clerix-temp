<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TopSellingProduct extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Product::query()->latest()->take(10)
            )
            ->columns([
                TextColumn::make('sku')
                    ->label('SKU')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('name')
                    ->label('Product Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('price')
                    ->label('Price')
                    ->sortable()
                    ->formatStateUsing(fn($state) => number_format($state, 2)),

                TextColumn::make('stock')
                    ->label('Stock')
                    ->sortable(),
            ]);
    }
}
