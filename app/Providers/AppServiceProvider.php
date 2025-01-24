<?php

namespace App\Providers;

use App\Models\Adjustment;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Supplier;
use App\Models\Transfer;
use App\Observers\AdjustmentObserver;
use App\Observers\CustomerObserver;
use App\Observers\ExpenseObserver;
use App\Observers\PaymentObserver;
use App\Observers\ProductObserver;
use App\Observers\PurchaseObserver;
use App\Observers\SaleObserver;
use App\Observers\SupplierObserver;
use App\Observers\TransferObserver;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Purchase::observe(PurchaseObserver::class);
        Sale::observe(SaleObserver::class);
        Supplier::observe(SupplierObserver::class);
        Payment::observe(PaymentObserver::class);
    }
}
