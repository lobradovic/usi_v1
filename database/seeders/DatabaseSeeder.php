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

        $this->call(RoleSeeder::class);
        $this->call(JeloSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RezervacijaSeeder::class);
        $this->call(StavkaSeeder::class);

        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
                'role_id'=>1
            ]);
        // dodavanje menadzera
        $man = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'manager@manager.com',
                'password' => \Hash::make('manager'),
                'role_id'=>2
            ]);       


    }
}
