<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Transfer extends Model
{
    /** @use HasFactory<\Database\Factories\TransferFactory> */
    use HasFactory;
    use LogsActivity;

    protected $guarded = [];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function productCount(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->products()->count(),
        );
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['tracking_number', 'date', 'from_location', 'to_location', 'note']);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->tracking_number = random_int(100_000, 999_999);
        });
    }
}
