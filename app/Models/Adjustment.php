<?php

namespace App\Models;

use App\Models\DataEntryLogs\AdjustmentLog;
use COM;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Adjustment extends Model
{
    /** @use HasFactory<\Database\Factories\AdjustmentFactory> */
    use HasFactory;
    use LogsActivity;

    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['tracking_number', 'warehouse_id']);
    }

    public function productCount(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->products()->count(),
        );
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->tracking_number = "A-" . random_int(100_000, 999_999);
        });
    }
}
