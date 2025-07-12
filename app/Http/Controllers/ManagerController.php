<?php

namespace App\Http\Controllers;

use App\Models\Rezervacija;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index(Request $request): View
    {
        $rez=Rezervacija::all();
        return view('manager.index',['rez'=>$rez]);
    }

    public function edit(Request $request, Rezervacija $rez): View
    {
        return view('manager.edit', [
            'rez' => $rez
        ]);
    }

    public function update(Request $request, Rezervacija $rez): RedirectResponse
    {
        $rez->update($request->validated());

        $request->session()->flash('rezervacija.id', $rez->id);

        return redirect()->route('manager.index');
    }
}
