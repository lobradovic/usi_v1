<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use App\Models\Jelo;

class jeloTest extends TestCase
{
    public function testJeloSviPodaciAdmin()
    {
        $admin = User::factory()->create([
            'role_id' => 1,
        ]);

        $jelo = [
            'naziv_jela' => 'Test jelo',
            'opis' => 'Test opis',
            'cena' => 600,
        ];

        $response = $this->actingAs($admin)->post(route('jelos.store'), $jelo);
        $this->assertDatabaseHas('jelos', [
            'naziv_jela' => 'Test jelo',
            'opis' => 'Test opis',
            'cena' => 600,
        ]);
    }

    public function testJeloSviPodaciNijeAdmin()
    {
        $admin = User::factory()->create([
            'role_id' => 2,
        ]);

        $jelo = [
            'naziv_jela' => 'Test jelo',
            'opis' => 'Test opis',
            'cena' => 600,
        ];

        $response = $this->actingAs($admin)->post(route('jelos.store'), $jelo);
        $response->assertStatus(403);
    }

    public function testJeloFaliNaziv()
    {
        $admin = User::factory()->create([
            'role_id' => 1,
        ]);

        $jelo = [
            'opis' => 'Test opis',
            'cena' => 600,
        ];

        $response = $this->actingAs($admin)->post(route('jelos.store'), $jelo);
        $response->assertSessionHasErrors('naziv_jela');      
    }

    public function testJeloFaliCena()
    {
        $admin = User::factory()->create([
            'role_id' => 1,
        ]);

        $jelo = [
            'naziv_jela' => 'Test jelo',
            'opis' => 'Test opis',
        ];

        $response = $this->actingAs($admin)->post(route('jelos.store'), $jelo);
        $response->assertSessionHasErrors('cena');      
    }

    public function testJeloFaliOpis()
    {
        $admin = User::factory()->create([
            'role_id' => 1,
        ]);

        $jelo = [
            'naziv_jela' => 'Test jelo',
            'cena'=>600,
            'opis' => 'Test opis',
        ];

        $response = $this->actingAs($admin)->post(route('jelos.store'), $jelo);
        $this->assertDatabaseHas('jelos', [
            'naziv_jela' => 'Test jelo',
            'cena' => 600,
        ]);   
    }

}
