<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Supplier;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StoreOverview extends BaseWidget
{
    // protected int | string | array $columnSpan = 2;

    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Products', Product::count())
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'onclick' => "window.location.href='{{ route('filament.admin.resources.products.index') }}'",
                ]),
            Stat::make('Total Customers', Customer::count()),
            Stat::make('Total Categories', Category::count()),
            Stat::make('Total Suppliers', Supplier::count())
                ->description('Total product suppliers')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }


    protected function getColumns(): int
    {
        return 2;
    }
}
