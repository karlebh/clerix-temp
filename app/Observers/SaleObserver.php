<?php

namespace App\Observers;

use App\Models\DataEntryLogs\SaleLog;
use App\Models\Sale;
use App\Models\User;

class SaleObserver
{
    private function helper($sale, $type = null)
    {
        $callingFunction = debug_backtrace()[1]['function'];

        if ($callingFunction === 'creating') {
            $sale->invoice_number = 'INV-' . random_int(100_000, 999_999);
        }

        $user = auth()->user() ? auth()->user() : User::inRandomOrder()->first();

        $role = '';

        if ($user->hasRole('manager')) {
            $role = 'manager';
        } else if ($user->hasRole('admin')) {
            $role = 'admin';
        } else if ($user->hasRole('staff')) {
            $role = 'staff';
        }

        SaleLog::create([
            'invoice_number' => $sale->invoice_number,
            'type' => strtoupper($callingFunction),
            'type' => $type ? $type : strtoupper($callingFunction),
            'is_returned' => $sale->is_returned ? true : false,
            'by' => strtoupper($role),
        ]);
    }

    /**
     * Handle the Sale "creating" event.
     */
    public function creating(Sale $sale): void
    {
        $this->helper($sale, 'created');
    }

    /**
     * Handle the Sale "updated" event.
     */
    public function updated(Sale $sale): void
    {
        $this->helper($sale);
    }

    /**
     * Handle the Sale "deleted" event.
     */
    public function deleted(Sale $sale): void
    {
        $this->helper($sale);
    }

    /**
     * Handle the Sale "restored" event.
     */
    public function restored(Sale $sale): void
    {
        $this->helper($sale);
    }

    /**
     * Handle the Sale "force deleted" event.
     */
    public function forceDeleted(Sale $sale): void
    {
        $this->helper($sale);
    }
}
