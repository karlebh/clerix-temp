<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Warehouse;

class ProductWarehouseSeeder extends Seeder
{
    public function run()
    {
        $products = Product::factory(10)->create();
        $warehouses = Warehouse::factory(5)->create();

        foreach ($products as $product) {
            $product->warehouses()->attach(
                $warehouses->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
