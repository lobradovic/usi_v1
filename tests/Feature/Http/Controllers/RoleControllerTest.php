<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RoleController
 */
final class RoleControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $roles = Role::factory()->count(3)->create();

        $response = $this->get(route('roles.index'));

        $response->assertOk();
        $response->assertViewIs('role.index');
        $response->assertViewHas('roles');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('roles.create'));

        $response->assertOk();
        $response->assertViewIs('role.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RoleController::class,
            'store',
            \App\Http\Requests\RoleStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('roles.store'));

        $response->assertRedirect(route('roles.index'));
        $response->assertSessionHas('role.id', $role->id);

        $this->assertDatabaseHas(roles, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $role = Role::factory()->create();

        $response = $this->get(route('roles.show', $role));

        $response->assertOk();
        $response->assertViewIs('role.show');
        $response->assertViewHas('role');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $role = Role::factory()->create();

        $response = $this->get(route('roles.edit', $role));

        $response->assertOk();
        $response->assertViewIs('role.edit');
        $response->assertViewHas('role');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RoleController::class,
            'update',
            \App\Http\Requests\RoleUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $role = Role::factory()->create();

        $response = $this->put(route('roles.update', $role));

        $role->refresh();

        $response->assertRedirect(route('roles.index'));
        $response->assertSessionHas('role.id', $role->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $role = Role::factory()->create();

        $response = $this->delete(route('roles.destroy', $role));

        $response->assertRedirect(route('roles.index'));

        $this->assertModelMissing($role);
    }
}
