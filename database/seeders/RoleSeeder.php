<?php

namespace Database\Seeders;

use App\Models\Role;
use DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['naziv_role' => 'Admin']);
        Role::create(['naziv_role' => 'Menadžer']);
        Role::create(['naziv_role' => 'Klijent']);
    }
}
