<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Adjustment;
use App\Models\Product;

class AdjustmentSeeder extends Seeder
{
    public function run()
    {

        Adjustment::factory()->count(10)->create()->each(function ($adjustment) {
            $productIds = Product::inRandomOrder()->take(rand(1, 5))->pluck('id');
            $adjustment->products()->attach($productIds);
        });
    }
}
