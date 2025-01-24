<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        $category = Category::inRandomOrder()->first();
        $brand = Brand::inRandomOrder()->first();
        $unit = Unit::inRandomOrder()->first();
        $productName = "Produvt " . random_int(100_000, 999_999);

        return [
            'sku' => $this->faker->unique()->numerify('SKU-######'),
            'name' => $this->faker->unique()->numerify('Product-######'),
            'description' => $this->faker->sentence(),
            'brand_id' => $brand->id,
            'unit_id' => $unit->id,
            'category_id' => $category->id,
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'stock' => $this->faker->numberBetween(0, 100),
            'unit' => $unit->name,
            'supplier_id' => Supplier::factory(),
        ];
    }
}
