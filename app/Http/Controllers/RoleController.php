<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function index(Request $request): View
    {
        //proverava da li je korisnik ulogovan u sistem i ima odgovarajucu rolu, ako nije salje kod 403
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $roles = Role::all();

        return view('role.index', [
            'roles' => $roles,
        ]);
    }

    public function create(Request $request): View
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        return view('role.create');
    }

    public function store(RoleStoreRequest $request): RedirectResponse
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $role = Role::create($request->validated());

        $request->session()->flash('role.id', $role->id);

        return redirect()->route('roles.index');
    }

    public function show(Request $request, Role $role): View
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        return view('role.show', [
            'role' => $role,
        ]);
    }

    public function edit(Request $request, Role $role): View
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        return view('role.edit', [
            'role' => $role,
        ]);
    }

    public function update(RoleUpdateRequest $request, Role $role): RedirectResponse
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $role->update($request->validated());

        $request->session()->flash('role.id', $role->id);

        return redirect()->route('roles.index');
    }

    public function destroy(Request $request, Role $role): RedirectResponse
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $role->delete();

        return redirect()->route('roles.index');
    }
}
