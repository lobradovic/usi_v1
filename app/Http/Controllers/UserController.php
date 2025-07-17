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
    public function index(Request $request): View
    {
        $users=User::all();
        $roles=Role::all();

        return view('users.index', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    public function edit(Request $request, User $user): View
    {
        $roles=Role::all();
        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return redirect()->route('users.index');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
