<?php

namespace Database\Factories;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class WarehouseFactory extends Factory
{
    protected $model = Warehouse::class;

    public function definition()
    {
        $name = "warehouse " .  $this->faker->unique()->numberBetween(1000, 9999);

        return [
            'name' => $name,
            'address' => $this->faker->address(),
            'stock' => random_int(1000, 9000),
        ];
    }
}
