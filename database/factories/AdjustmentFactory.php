<?php

namespace Database\Factories;

use App\Models\Adjustment;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdjustmentFactory extends Factory
{
    public function definition()
    {
        return [
            'tracking_number' => $this->faker->unique()->numerify('TRK#####'),
            'warehouse_id' => Warehouse::factory(),
        ];
    }
}
