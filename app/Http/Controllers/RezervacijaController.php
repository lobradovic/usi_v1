<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rezervacija;
use App\Models\Jelo;

class RezervacijaController extends Controller
{
    public function dodaj(Request $request, $id)
    {

        $jelo = Jelo::findOrFail($id);
        $korpa = session()->get('korpa', []);


            $korpa[$id] = [
                'naziv_jela' => $jelo->naziv_jela,
                'cena' => $jelo->cena,
                'opis'=>$jelo->opis
            ];
        

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
                'trenutna_cena' => $stavka['cena']
            ]);
        }

        session()->forget('korpa');

        return redirect('/')->with('success', 'Porudžbina sačuvana u bazi!');
    }
}

