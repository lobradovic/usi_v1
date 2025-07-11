<?php

namespace Database\Seeders;

use App\Models\Rezervacija;
use Illuminate\Database\Seeder;

class RezervacijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rezervacija::create([
            'datum' => '22-06-2025',
            'adresa' => 'Preradoviceva 2',
            'user_id' => 5,
            'status_id'=>3
            ]);
        Rezervacija::create([
            'datum' => '23-07-2025',
            'adresa' => 'Ljermotova 13',
            'user_id' => 3,
            'status_id'=>1
            ]);
        Rezervacija::create([
            'datum' => '25-07-2025',
            'adresa' => 'Simina 5',
            'user_id' => 6,
            'status_id'=>2
            ]);
        Rezervacija::create([
            'datum' => '24-06-2025',
            'adresa' => 'Glavna 22',
            'user_id' => 7,
            'status_id'=>4
            ]);
        Rezervacija::create([
            'datum' => '11-07-2025',
            'adresa' => 'Mokroluska 54',
            'user_id' => 8,
            'status_id'=>3
            ]);
    }
}
