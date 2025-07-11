<?php

namespace Database\Seeders;

use App\Models\Jelo;
use Illuminate\Database\Seeder;

class JeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jelo::create([
            'naziv_jela' => 'Krompir salata',
            'opis' => 'Posno jelo',
            'cena' => 500,
            ]);

        Jelo::create([
            'naziv_jela' => 'Plata sa suhomesnatim proizvodima',
            'opis' => 'Selekcija suhomesnatih proizvoda',
            'cena' => 5500,
            ]);

        Jelo::create([
            'naziv_jela' => 'Pileci stapici',
            'cena' => 1500,
            ]);

        Jelo::create([
            'naziv_jela' => 'Pileca mango salata',
            'opis' => 'Salata sa mangom i piletinom',
            'cena' => 1500,
            ]);

        Jelo::create([
            'naziv_jela' => 'Selekcija sireva',
            'opis' => 'Domaci i strani sirevi',
            'cena' => 4200,
            ]);
    }
}
