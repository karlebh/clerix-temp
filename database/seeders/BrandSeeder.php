<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'bag',
            'ltr',
            'ml',
            'pack',
            'ton',
            'cartoon',
            'piece',
            'gram',
            'kg',
            'pcs',
        ];

        foreach ($brands as $brand) {
            Brand::factory()->create([
                'name' => $brand,
            ]);
        }
    }
}
