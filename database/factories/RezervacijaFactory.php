<?php

namespace Database\Factories;

use App\Models\Rezervacija;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RezervacijaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rezervacija::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'datum' => $this->faker->date(),
            'adresa' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
            'status_id' => \App\Models\Status::factory(),
        ];
    }
}
