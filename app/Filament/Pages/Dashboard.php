<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
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

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    protected function getHeaderWidgets(): array
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

    protected function getViewData(): array
    {
        return [];
    }
}
