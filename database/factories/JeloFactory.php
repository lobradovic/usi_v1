<?php

namespace Database\Factories;

use App\Models\Jelo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class JeloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jelo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'naziv_jela' => $this->faker->text(255),
            'cena' => $this->faker->randomNumber(0),
            'opis' => $this->faker->text(),
        ];
    }
}
