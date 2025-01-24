<?php

namespace App\Observers;

use App\Models\Customer;
use App\Models\DataEntryLogs\PaymentLog;
use App\Models\Payment;
use App\Models\Supplier;
use App\Models\User;

class PaymentObserver
{
    private function helper($payment)
    {
        $callingFunction = debug_backtrace()[1]['function'];

        if ($callingFunction === 'creating') {
            $payment->trx = strtoupper(str()->random(10));
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

        $classes = [Supplier::class, Customer::class];
        $class = $classes[array_rand($classes)];
        $model = $class::factory()->create();

        PaymentLog::create([
            'trx' => $payment->trx,
            'paymentlogable_id' => $model->id,
            'paymentlogable_type' => $model::class,
            'type' => strtoupper($callingFunction),
            'by' => strtoupper($role),
            'amount' => $model::class === Supplier::class ? $model->payable : 1000,
        ]);
    }
    /**
     * Handle the Payment "creating" event.
     */
    public function creating(Payment $payment): void
    {
        $this->helper($payment);
    }

    /**
     * Handle the Payment "updated" event.
     */
    public function updated(Payment $payment): void
    {
        $this->helper($payment);
    }

    /**
     * Handle the Payment "deleted" event.
     */
    public function deleted(Payment $payment): void
    {
        $this->helper($payment);
    }

    /**
     * Handle the Payment "restored" event.
     */
    public function restored(Payment $payment): void
    {
        $this->helper($payment);
    }

    /**
     * Handle the Payment "force deleted" event.
     */
    public function forceDeleted(Payment $payment): void
    {
        $this->helper($payment);
    }
}
