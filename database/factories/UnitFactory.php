<?php

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitFactory extends Factory
{
    protected $model = Unit::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['bag', 'ltr', 'ml', 'pack', 'ton', 'cartoon', 'piece', 'gram', 'kg', 'pcs']),
            'quantity' => $this->faker->numberBetween(0, 10),
        ];
    }
}
