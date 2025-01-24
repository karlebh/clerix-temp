<?php

namespace Database\Seeders;

use App\Models\ExpenseType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            "Breakfast",
            "Dinner",
            "Lunch",
            "Utility",
            "Snack",
            "Beverage",
            "Brunch",
            "Supper",
            "Dessert",
            "Tea Time",
            "Groceries",
            "Essentials",
            "Household",
            "Lunch Box",
            "Midnight Snack",
            "Health & Wellness",
            "Pantry Supplies",
            "Cleaning Supplies",
            "Toiletries",
            "Quick Bites"
        ];

        foreach ($names as $name) {
            ExpenseType::create(['name' => $name]);
        }
    }
}
