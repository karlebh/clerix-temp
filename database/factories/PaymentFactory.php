<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $classes = [Supplier::class, Customer::class];
        $class = $classes[array_rand($classes)];
        $model = $class::factory()->create();
        $id = $model->id;

        return [
            'invoice_number' => $this->faker->unique()->numerify('INV#####'),
            'date' => $this->faker->date(),
            'paymentable_type' => $class,
            'paymentable_id' => $id,
            'trx' => strtoupper(str()->random(10)),
            'reason' => $this->faker->optional()->sentence(4),
            'amount' => $this->faker->randomFloat(2, 100, 10000),
        ];
    }
}
