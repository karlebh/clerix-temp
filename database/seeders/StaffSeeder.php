<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    public function run()
    {
        $staff = Staff::factory()->count(10)->create();
        // $staff->assignRole($staff->role);
    }
}
