<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Rezervacija;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RezervacijaController
 */
final class RezervacijaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $rezervacijas = Rezervacija::factory()->count(3)->create();

        $response = $this->get(route('rezervacijas.index'));

        $response->assertOk();
        $response->assertViewIs('rezervacija.index');
        $response->assertViewHas('rezervacijas');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('rezervacijas.create'));

        $response->assertOk();
        $response->assertViewIs('rezervacija.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RezervacijaController::class,
            'store',
            \App\Http\Requests\RezervacijaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('rezervacijas.store'));

        $response->assertRedirect(route('rezervacijas.index'));
        $response->assertSessionHas('rezervacija.id', $rezervacija->id);

        $this->assertDatabaseHas(rezervacijas, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $rezervacija = Rezervacija::factory()->create();

        $response = $this->get(route('rezervacijas.show', $rezervacija));

        $response->assertOk();
        $response->assertViewIs('rezervacija.show');
        $response->assertViewHas('rezervacija');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $rezervacija = Rezervacija::factory()->create();

        $response = $this->get(route('rezervacijas.edit', $rezervacija));

        $response->assertOk();
        $response->assertViewIs('rezervacija.edit');
        $response->assertViewHas('rezervacija');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RezervacijaController::class,
            'update',
            \App\Http\Requests\RezervacijaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $rezervacija = Rezervacija::factory()->create();

        $response = $this->put(route('rezervacijas.update', $rezervacija));

        $rezervacija->refresh();

        $response->assertRedirect(route('rezervacijas.index'));
        $response->assertSessionHas('rezervacija.id', $rezervacija->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $rezervacija = Rezervacija::factory()->create();

        $response = $this->delete(route('rezervacijas.destroy', $rezervacija));

        $response->assertRedirect(route('rezervacijas.index'));

        $this->assertModelMissing($rezervacija);
    }
}
