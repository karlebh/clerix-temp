<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffFactory extends Factory
{
    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'name' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'role' => $this->faker->randomElement(['manager', 'staff']),
            'status' => $this->faker->boolean(),
        ];
    }
}
