<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Jelo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\JeloController
 */
final class JeloControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $jelos = Jelo::factory()->count(3)->create();

        $response = $this->get(route('jelos.index'));

        $response->assertOk();
        $response->assertViewIs('jelo.index');
        $response->assertViewHas('jelos');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('jelos.create'));

        $response->assertOk();
        $response->assertViewIs('jelo.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\JeloController::class,
            'store',
            \App\Http\Requests\JeloStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('jelos.store'));

        $response->assertRedirect(route('jelos.index'));
        $response->assertSessionHas('jelo.id', $jelo->id);

        $this->assertDatabaseHas(jelos, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $jelo = Jelo::factory()->create();

        $response = $this->get(route('jelos.show', $jelo));

        $response->assertOk();
        $response->assertViewIs('jelo.show');
        $response->assertViewHas('jelo');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $jelo = Jelo::factory()->create();

        $response = $this->get(route('jelos.edit', $jelo));

        $response->assertOk();
        $response->assertViewIs('jelo.edit');
        $response->assertViewHas('jelo');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\JeloController::class,
            'update',
            \App\Http\Requests\JeloUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $jelo = Jelo::factory()->create();

        $response = $this->put(route('jelos.update', $jelo));

        $jelo->refresh();

        $response->assertRedirect(route('jelos.index'));
        $response->assertSessionHas('jelo.id', $jelo->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $jelo = Jelo::factory()->create();

        $response = $this->delete(route('jelos.destroy', $jelo));

        $response->assertRedirect(route('jelos.index'));

        $this->assertModelMissing($jelo);
    }
}
