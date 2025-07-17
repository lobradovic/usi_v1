<?php

namespace App\Http\Controllers;

use App\Http\Requests\JeloStoreRequest;
use App\Http\Requests\JeloUpdateRequest;
use App\Models\Jelo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JeloController extends Controller
{
    public function index(Request $request): View
    {
        $jelos = Jelo::all();

        return view('jelo.index', [
            'jelos' => $jelos,
        ]);
    }

    public function admin(Request $request):View
    {
        if (auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $jelos = Jelo::all();

        return view('jelo.admin', [
            'jelos' => $jelos,
        ]);        
    }

    public function create(Request $request): View
    {
        if (auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        return view('jelo.create');
    }

    public function store(JeloStoreRequest $request): RedirectResponse
    {
        if (auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $jelo = Jelo::create($request->validated());

        $request->session()->flash('jelo.id', $jelo->id);

        return redirect()->route('admin.jelo');
    }

    public function show(Request $request, Jelo $jelo): View
    {
        if (auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        return view('jelo.show', [
            'jelo' => $jelo,
        ]);
    }

    public function edit(Request $request, Jelo $jelo): View
    {
        if (auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        return view('jelo.edit', [
            'jelo' => $jelo,
        ]);
    }

    public function update(JeloUpdateRequest $request, Jelo $jelo): RedirectResponse
    {
        if (auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $jelo->update($request->validated());

        $request->session()->flash('jelo.id', $jelo->id);

        return redirect()->route('jelos.index');
    }

    public function destroy(Request $request, Jelo $jelo): RedirectResponse
    {
        if (auth()->user()->role->naziv_role !== 'Admin')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $jelo->delete();

        return redirect()->route('admin.jelo');
    }
}
