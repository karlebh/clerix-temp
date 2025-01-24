<?php

namespace App\Observers;

use App\Models\DataEntryLogs\PurchaseLog;
use App\Models\Purchase;
use App\Models\User;

class PurchaseObserver
{
    private function helper($purchase, $type = null)
    {
        $callingFunction = debug_backtrace()[1]['function'];

        if ($callingFunction === 'creating') {
            $purchase->invoice_number = "P-" .  random_int(100_000, 999_999);
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

        PurchaseLog::create([
            'invoice_number' => $purchase->invoice_number,
            'type' => $type ? $type : strtoupper($callingFunction),
            'is_returned' => $purchase->is_returned ? true : false,
            'by' => strtoupper($role),
        ]);
    }
    /**
     * Handle the Purchase "creating" event.
     */
    public function creating(Purchase $purchase): void
    {
        $this->helper($purchase, 'created');
    }

    /**
     * Handle the Purchase "updated" event.
     */
    public function updated(Purchase $purchase): void
    {
        $this->helper($purchase);
    }

    /**
     * Handle the Purchase "deleted" event.
     */
    public function deleted(Purchase $purchase): void
    {
        $this->helper($purchase);
    }

    /**
     * Handle the Purchase "restored" event.
     */
    public function restored(Purchase $purchase): void
    {
        $this->helper($purchase);
    }

    /**
     * Handle the Purchase "force deleted" event.
     */
    public function forceDeleted(Purchase $purchase): void
    {
        $this->helper($purchase);
    }
}
