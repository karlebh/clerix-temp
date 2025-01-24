<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\Transfer;

class TransferSeeder extends Seeder
{
    public function run()
    {
        Transfer::factory()->count(10)->create();

        $transfers =  Transfer::all();

        foreach ($transfers as $transfer) {
            $products = Product::inRandomOrder()->take(7)->get();
            $transfer->products()->attach($products->pluck('id')->toArray());
        }
    }
}
