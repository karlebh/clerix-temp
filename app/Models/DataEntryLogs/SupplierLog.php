<?php

namespace App\Models\DataEntryLogs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class SupplierLog extends Model
{
    protected $guarded = [];

    public function payment(): MorphOne
    {
        return $this->morphOne(PaymentLog::class, 'paymentlogable');
    }
}
