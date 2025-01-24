<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        User::factory()->count(10)->create([
            'password' => bcrypt('12345678'),
        ]);

        // ->each(function ($user) {
        //     $roles = ['manager', 'admin', 'staff'];
        //     $role = $roles[array_rand($roles)];
        //     $user->assignRole($role);
        // });
    }
}
