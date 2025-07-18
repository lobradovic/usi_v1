<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusStoreRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatusController extends Controller
{
    public function index(Request $request): View
    {
        //proverava da li je korisnik ulogovan u sistem i ima odgovarajucu rolu, ako nije salje kod 403
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $statuses = Status::all();

        return view('status.index', [
            'statuses' => $statuses,
        ]);
    }

    public function create(Request $request): View
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        return view('status.create');
    }

    public function store(StatusStoreRequest $request): RedirectResponse
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $status = Status::create($request->validated());

        $request->session()->flash('status.id', $status->id);

        return redirect()->route('statuses.index');
    }

    public function show(Request $request, Status $status): View
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        return view('status.show', [
            'status' => $status,
        ]);
    }

    public function edit(Request $request, Status $status): View
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        return view('status.edit', [
            'status' => $status,
        ]);
    }

    public function update(StatusUpdateRequest $request, Status $status): RedirectResponse
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $status->update($request->validated());

        $request->session()->flash('status.id', $status->id);

        return redirect()->route('statuses.index');
    }

    public function destroy(Request $request, Status $status): RedirectResponse
    {
        if (!auth()->check() || auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $status->delete();

        return redirect()->route('statuses.index');
    }
}
