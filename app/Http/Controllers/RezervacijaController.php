<?php

namespace App\Http\Controllers;

use App\Http\Requests\RezervacijaStoreRequest;
use App\Http\Requests\RezervacijaUpdateRequest;
use App\Models\Rezervacija;
use App\Models\Jelo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RezervacijaController extends Controller
{
    public function index(Request $request): View
    {
        $rezervacijas = Rezervacija::all();

        return view('rezervacija.index', [
            'rezervacijas' => $rezervacijas,
        ]);
    }

    public function create(Request $request): View
    {
        return view('rezervacija.create');
    }

    public function store(RezervacijaStoreRequest $request): RedirectResponse
    {
        $rezervacija = Rezervacija::create($request->validated());

        $request->session()->flash('rezervacija.id', $rezervacija->id);

        return redirect()->route('rezervacijas.index');
    }

    public function show(Request $request, Rezervacija $rezervacija): View
    {
        return view('rezervacija.show', [
            'rezervacija' => $rezervacija,
        ]);
    }

    public function edit(Request $request, Rezervacija $rezervacija): View
    {
        return view('rezervacija.edit', [
            'rezervacija' => $rezervacija,
        ]);
    }

    public function update(RezervacijaUpdateRequest $request, Rezervacija $rezervacija): RedirectResponse
    {
        $rezervacija->update($request->validated());

        $request->session()->flash('rezervacija.id', $rezervacija->id);

        return redirect()->route('rezervacijas.index');
    }

    public function destroy(Request $request, Rezervacija $rezervacija): RedirectResponse
    {
        $rezervacija->delete();

        return redirect()->route('rezervacijas.index');
    }

    public function dodaj(Request $request, $id)
    {

        $jelo = Jelo::findOrFail($id);
        $korpa = session()->get('korpa', []);


        if (isset($korpa[$id])) {
            $korpa[$id]['kolicina']++;
        } else {
            $korpa[$id] = [
                'naziv_jela' => $jelo->naziv_jela,
                'cena' => $jelo->cena,
                'opis' => $jelo->opis,
                'kolicina' => 1
            ];
        }
        

        session()->put('korpa', $korpa);
        return redirect()->back()->with('success', 'Jelo dodato u korpu.');
    }

    public function prikazi()
    {

        $korpa = session()->get('korpa', []);
        return view('korpa.index', compact('korpa'));
    }

    public function obrisi($id)
    {
        $korpa = session()->get('korpa', []);

        if (isset($korpa[$id])) {
            unset($korpa[$id]);
            session()->put('korpa', $korpa);
        }

        return redirect()->route('korpa.prikazi');
    }

    public function izvrsi(Request $request)
    {
        $korpa = session()->get('korpa');

        if (!$korpa || empty($korpa)) {
            return redirect()->back()->with('error', 'Korpa je prazna!');
        }

        $porudzbina = Rezervacija::create([
            'datum' => $request->input('datum'),
            'adresa' => $request->input('adresa'),
            'status' => 1,
            'user_id'=>auth()->id()
        ]);

        foreach ($korpa as $jeloId => $stavka) {
            $porudzbina->stavkas()->create([
                'jelo_id' => $jeloId,
                'trenutna_cena' => $stavka['cena'],
                'kolicina'=>$stavka['kolicina']
            ]);
        }

        session()->forget('korpa');

        return redirect('/')->with('success', 'Porudžbina sačuvana u bazi!');
    }
    public function izmeniKolicinu(Request $request, $id)
    {
        $korpa = session()->get('korpa', []);

        if (isset($korpa[$id]))
        {
            $novaKolicina = (int) $request->input('kolicina');
            if ($novaKolicina > 0) {
                $korpa[$id]['kolicina'] = $novaKolicina;
            }
            else
            {
                unset($korpa[$id]);
            }
            session()->put('korpa', $korpa);
        }

        return redirect()->route('korpa.prikazi')->with('success', 'Količina artikla je ažurirana.');
    }
}
