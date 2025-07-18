<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;

class pristupAdminuPaneluTest extends TestCase
{
    public function test_neulogovani_korisnik()
    {
        $response = $this->get('/admin');

        $response->assertStatus(403);
    }

    public function test_korisnik_bez_role()
    {
        $user=User::factory()->create(['role_id'=>3]);

        $response = $this->actingAs($user)->get('/admin');
        $response->assertStatus(403);
    }
    public function test_korisnik_menadzer()
    {
        $user=User::factory()->create(['role_id'=>2]);
        
        $response = $this->actingAs($user)->get('/admin');
        $response->assertStatus(403);
    }

    public function test_korisnik_admin()
    {
        $user=User::factory()->create(['role_id'=>1]);
        
        $response = $this->actingAs($user)->get('/admin');
        $response->assertStatus(200);
    }

}
