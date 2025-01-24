<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    public function run()
    {
        $units = [
            ['name' => 'bag', 'quantity' => 2],
            ['name' => 'ltr', 'quantity' => 1],
            ['name' => 'ml', 'quantity' => 0],
            ['name' => 'pack', 'quantity' => 0],
            ['name' => 'ton', 'quantity' => 2],
            ['name' => 'cartoon', 'quantity' => 0],
            ['name' => 'piece', 'quantity' => 8],
            ['name' => 'gram', 'quantity' => 0],
            ['name' => 'kg', 'quantity' => 2],
            ['name' => 'pcs', 'quantity' => 0],
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
