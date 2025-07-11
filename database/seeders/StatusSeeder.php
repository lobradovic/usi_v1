<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create(['naziv_statusa' => 'Prihvaćena']);
        Status::create(['naziv_statusa' => 'Potvrđena']);
        Status::create(['naziv_statusa' => 'Izvršena']);
        Status::create(['naziv_statusa' => 'Otkazana']);
    }
}
