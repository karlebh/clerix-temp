<?php

namespace App\Filament\Widgets;

use App\Models\Sale;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class SaleReturn extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Sale::query()->where('is_returned', true)->latest()
            )
            ->columns([
                TextColumn::make('invoice_number')
                    ->wrap()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('customer.name')
                    ->label('Customer Name')
                    ->wrap()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('total_amount')
                    ->label('Total Amount')
                    ->wrap()
                    ->sortable()
                    ->formatStateUsing(fn($state) => number_format($state, 2)),
            ]);
    }
}
