<?php

namespace Database\Factories;

use App\Models\Stavka;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StavkaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stavka::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trenutna_cena' => $this->faker->randomNumber(0),
            'rezervacija_id' => \App\Models\Rezervacija::factory(),
            'jelo_id' => \App\Models\Jelo::factory(),
        ];
    }
}
