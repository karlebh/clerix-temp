<?php

namespace Database\Factories;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    protected $model = Purchase::class;

    public function definition()
    {
        $total_amount = $this->faker->randomFloat(2, 100, 10000);
        $total_amount = $this->faker->randomFloat(2, 100, 10000);
        $discountPercentage = rand(0, 30);
        $discount = round(($discountPercentage / 100) * $total_amount);
        $receivable = round($total_amount - $discount);
        $received = round((rand(0, 80) / 100) * $receivable);
        $due =  round($receivable - $received);
        $is_paid = $due ? false : true;

        return [
            'invoice_number' => $this->faker->unique()->numerify('INV-#####'),
            'date' => $this->faker->date(),
            'supplier_id' => Supplier::factory(),
            'warehouse_id' => Warehouse::factory(),
            'total_amount' => $total_amount,
            'is_returned' => $this->faker->boolean(),
            'is_paid' => $is_paid,
            'discount' => $discount,
            'receivable' => $receivable,
            'received' => $received,
            'due' => $due,
        ];
    }
}
