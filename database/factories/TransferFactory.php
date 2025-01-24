<?php

namespace Database\Factories;

use App\Models\Transfer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransferFactory extends Factory
{
    protected $model = Transfer::class;

    public function definition()
    {
        return [
            'tracking_number' => $this->faker->uuid,
            'date' => $this->faker->date(),
            'from_location' => $this->faker->city,
            'to_location' => $this->faker->city,
            'note' => $this->faker->sentence(),
        ];
    }
}
