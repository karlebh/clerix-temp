<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            SupplierSeeder::class,
            UnitSeeder::class,
            BrandSeeder::class,
            WarehouseSeeder::class,
            ProductSeeder::class,
            CustomerSeeder::class,
            SaleSeeder::class,
            PurchaseSeeder::class,
            StaffSeeder::class,
            AdjustmentSeeder::class,
            ExpenseSeeder::class,

            AdminUserSeeder::class,
            ExpenseTypeSeeder::class,
            ReportSeeder::class,
            TransferSeeder::class,
            PaymentSeeder::class,
            ProductWarehouseSeeder::class
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
