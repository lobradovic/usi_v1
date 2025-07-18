<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class UserController extends Controller
{

    //prikazuje podatke o svim korisnicima
    public function index(Request $request): View
    {
        //proverava da li je korisnik ulogovan u sistem i ima odgovarajucu rolu, ako nije salje kod 403
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $users=User::all();
        $roles=Role::all();

        return view('users.index', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    public function edit(Request $request, User $user): View
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $roles=Role::all();
        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $user->update($request->validated());

        return redirect()->route('users.index');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $user->delete();

        return redirect()->route('users.index');
    }
}
