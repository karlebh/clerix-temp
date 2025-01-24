<?php

namespace App\Filament\Dashboard\Pages;

use App\Filament\Widgets\LatestSalesReturn;
use App\Filament\Widgets\PurchasePurchaseReturn;
use App\Filament\Widgets\PurchaseSaleChart;
use App\Filament\Widgets\SaleOverview;
use App\Filament\Widgets\SaleReturn;
use App\Filament\Widgets\SaleSaleReturn;
use App\Filament\Widgets\SaleWidget;
use App\Filament\Widgets\StockLevelAlert;
use App\Filament\Widgets\StoreOverview;
use App\Filament\Widgets\TopSellingProduct;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getColumns(): int | array
    {
        return 2;
    }

    public function getWidgets(): array
    {
        return [
            StoreOverview::class,
            SaleOverview::class,
            PurchaseSaleChart::class,
            SaleWidget::class,
            SaleReturn::class,
            PurchasePurchaseReturn::class,
            TopSellingProduct::class,
            LatestSalesReturn::class
        ];
    }
}
