<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name,
            'mobile' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'payable' => $this->faker->randomFloat(2, 1000, 10000),
            'receivable' => $this->faker->randomFloat(2, 500, 5000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
