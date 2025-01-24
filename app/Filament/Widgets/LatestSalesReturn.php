<?php

namespace App\Filament\Widgets;

use App\Models\Sale;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestSalesReturn extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Sale::query()->where('is_returned', 1)->latest()->take(10)
            )
            ->columns([
                TextColumn::make('invoice_number')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('customer_name')
                    ->label('Customer Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('total_amount')
                    ->label('Total Amount')
                    ->sortable()
                    ->formatStateUsing(fn($state) => number_format($state, 2)),

                TextColumn::make('due')
                    ->label('Due Amount')
                    ->sortable()
                    ->formatStateUsing(fn($state) => number_format($state, 2)),
            ]);
    }
}
