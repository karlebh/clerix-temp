<?php

namespace App\Models\DataEntryLogs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class PaymentLog extends Model
{
    protected $guarded = [];

    public function paymentlogable(): MorphTo
    {
        return $this->morphTo();
    }
}
