<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Sale;
use App\Models\Supplier;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SaleOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected static ?string $heading = 'Dashboard Stats Overview';

    protected function getStats(): array
    {

        return [
            Stat::make('Total Sales', Sale::count())
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'onclick' => "window.location.href='{{ route('filament.admin.resources.products.index') }}'",
                ])->extraAttributes([
                    'class' => 'min-h-16',
                ]),
            Stat::make('Total Customers Sale',  "$" . number_format(Sale::sum('total_amount')))->description('Total sale amount'),
            Stat::make('Total Categories', Category::count()),
            Stat::make('Total Suppliers', Supplier::count()),
        ];
    }


    protected function getColumns(): int
    {
        return 2;
    }
}
