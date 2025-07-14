<?php

namespace Database\Seeders;

use App\Models\Stavka;
use Illuminate\Database\Seeder;

class StavkaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stavka::create([
            'rezervacija_id' => 1,
            'jelo_id' => 1,
            'trenutna_cena' => 500,
            'kolicina'=>5
        ]);

        Stavka::create([
            'rezervacija_id' => 1,
            'jelo_id' => 3,
            'trenutna_cena' => 1500,
            'kolicina'=>3
        ]);

        Stavka::create([
            'rezervacija_id' => 2,
            'jelo_id' => 2,
            'trenutna_cena' => 5500,
            'kolicina'=>1
        ]);

        Stavka::create([
            'rezervacija_id' => 2,
            'jelo_id' => 4,
            'trenutna_cena' => 1500,
            'kolicina'=>2
        ]);

        Stavka::create([
            'rezervacija_id' => 3,
            'jelo_id' => 5,
            'trenutna_cena' => 4200,
            'kolicina'=>1
        ]);

        Stavka::create([
            'rezervacija_id' => 4,
            'jelo_id' => 1,
            'trenutna_cena' => 500,
            'kolicina'=>4
        ]);

        Stavka::create([
            'rezervacija_id' => 5,
            'jelo_id' => 3,
            'trenutna_cena' => 1500,
            'kolicina'=>2
        ]);
    }
}
