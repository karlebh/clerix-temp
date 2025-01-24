<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['bug', 'feature'];
        $randomType = $types[array_rand($types)];
        $statuses = [
            'submitted',
            'in-progress',
            'under-review',
            'staging',
            'closed',
        ];
        $status = $statuses[array_rand($statuses)];


        return [
            'type' => $randomType,
            'message' => $this->faker->sentence(5),
            'status' => $status,
        ];
    }
}
