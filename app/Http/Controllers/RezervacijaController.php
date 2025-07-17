<?php

namespace App\Http\Controllers;

use App\Http\Requests\RezervacijaStoreRequest;
use App\Http\Requests\RezervacijaUpdateRequest;
use App\Models\Rezervacija;
use App\Models\Jelo;
use App\Models\Status;
use App\Models\Stavka;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Auth;

class RezervacijaController extends Controller
{
    public function index(Request $request): View
    {
        //proverava da li je korisnik ulogovan u sistem, ako nije salje kod 403
        if (!auth()->check())
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }

        //trazi id ulogovanog korisnika
        $userId = Auth::id();

        //trazi rezervacije za ulogovanog korisnika
        $rezervacijas = Rezervacija::where('user_id', $userId)->get();

        return view('rezervacija.index', [
            'rezervacijas' => $rezervacijas,
        ]);
    }

    public function create(Request $request): View
    {
        //proverava da li je korisnik ulogovan u sistem, ako nije salje kod 403
        if (!auth()->check())
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        //prikazuje stranicu za kreiranje rezervacije - ne koristi se jer je implementiran sistem korpe
        return view('rezervacija.create');
    }

    public function store(RezervacijaStoreRequest $request): RedirectResponse
    {
        //proverava da li je korisnik ulogovan u sistem, ako nije salje kod 403
        if (!auth()->check())
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }

        //kreiranje rezervacije
        $rezervacija = Rezervacija::create($request->validated());

        $request->session()->flash('rezervacija.id', $rezervacija->id);

        return redirect()->route('rezervacijas.index');
    }

    public function show(Request $request, Rezervacija $rezervacija): View
    {
        //prikazuje podatke o jednoj rezervaciji
        if (!auth()->check())
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        return view('rezervacija.show', [
            'rezervacija' => $rezervacija,
        ]);
    }

    public function edit(Request $request, Rezervacija $rezervacija): View
    {
        if (!auth()->check())
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        return view('rezervacija.edit', [
            'rezervacija' => $rezervacija,
        ]);
    }

    public function update(RezervacijaUpdateRequest $request, Rezervacija $rezervacija): RedirectResponse
    {
        if (!auth()->check())
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }

        $rezervacija->update($request->validated());

        $request->session()->flash('rezervacija.id', $rezervacija->id);

        return redirect()->route('rezervacijas.index');
    }

    public function destroy(Request $request, Rezervacija $rezervacija): RedirectResponse
    {
        //brise rezervaciju
        if (!auth()->check())
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }

        //provera da li je status primljena, ako nije onda se ne moze obrisati rezervacija
        if($rezervacija->status->naziv_statusa!="Primljena")
        {
            return back()->with('error','Ne mozete obrisati ovu rezervaciju');
        }
        $rezervacija->delete();

        return redirect()->route('rezervacijas.index');
    }

    public function dodaj(Request $request, $id)
    {
        //proverava da li je korisnik ulogovan u sistem, ako nije salje kod 403
        if (!auth()->check())
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }

        //trazi jelo prema prosledjenom id-u i upisuje ga u session korpa
        $jelo = Jelo::findOrFail($id);
        $korpa = session()->get('korpa', []);

        //ako jelo vec postoji u korpi, povecaj kolicinu, u suprotnom dodaj ga u session
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
        //prikazuje stranicu korpa
        if (!auth()->check())
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $korpa = session()->get('korpa', []);
        return view('korpa.index', compact('korpa'));
    }

    public function obrisi($id)
    {

        if (!auth()->check())
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $korpa = session()->get('korpa', []);

        //brise odabrano jelo iz korpe
        if (isset($korpa[$id])) {
            unset($korpa[$id]);
            session()->put('korpa', $korpa);
        }

        return redirect()->route('korpa.prikazi');
    }
    public function isprazni()
    {
        if (!auth()->check())
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        //prazni celu korpu
        session()->forget('korpa');

        return redirect()->route('korpa.prikazi');
    }
    public function izvrsi(Request $request)
    {
        //proverava da li je korisnik ulogovan u sistem, ako nije salje kod 403
        if (!auth()->check())
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }

        $korpa = session()->get('korpa');
        
        //ako je korpa prazna ispisuje obavestenje
        if (!$korpa || empty($korpa)) {
            return redirect()->back()->with('error', 'Korpa je prazna!');
        }

        //provera gresaka
        $greske = [];

        if (!$request->filled('datum')) {
            $greske[] = 'Datum nije unet.';
        }

        if (!$request->filled('adresa')) {
            $greske[] = 'Adresa nije uneta.';
        }

        if (!empty($greske)) {
            return back()->withInput()->withErrors($greske);
        }
        //kreira porudzbinu sa podacima unesenim u formi
        $porudzbina = Rezervacija::create([
            'datum' => $request->input('datum'),
            'adresa' => $request->input('adresa'),
            'status' => 1,
            'user_id'=>auth()->id()
        ]);

        //upisuje svaku stavku iz korpe u tabelu sa stavkama 
        foreach ($korpa as $jeloId => $stavka) {
            $porudzbina->stavkas()->create([
                'jelo_id' => $jeloId,
                'trenutna_cena' => $stavka['cena'],
                'kolicina'=>$stavka['kolicina']
            ]);
        }
        //brise sesiju nakon uspesnog upisa
        session()->forget('korpa');

        return redirect('/')->with('success', 'Porudžbina sačuvana u bazi!');
    }
    public function izmeniKolicinu(Request $request, $id)
    {
        //menja kolicinu jednog artikla u korpi

        if (!auth()->check())
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        $korpa = session()->get('korpa', []);

        //ako je nova kolicina 0 onda se artikal brise iz korpe
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

    public function manager(Request $request): View
    {
        //proverava da li je korisnik ulogovan u sistem i ima odgovarajucu rolu, ako nije salje kod 403
        if (auth()->user()->role->naziv_role !== 'Menadžer')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }

        //prikazuje menadzer stranicu sa podacima za sve rezervacije
        $rez=Rezervacija::all();
        return view('manager.index',['rez'=>$rez]);
    }

    public function managerEdit(Request $request, $id): View
    {
        //proverava da li je korisnik ulogovan u sistem i ima odgovarajucu rolu, ako nije salje kod 403       
        if (auth()->user()->role->naziv_role !== 'Menadžer')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }
        //otvara odabranu rezervaciju
        $rezervacija=Rezervacija::findOrFail($id);
        $status=Status::all();
        return view('manager.edit', [
            'rezervacija' => $rezervacija,
            'status'=>$status
        ]);
    }

    public function managerUpdate(Request $request, $id): RedirectResponse
    {
        //proverava da li je korisnik ulogovan u sistem i ima odgovarajucu rolu, ako nije salje kod 403
        if (auth()->user()->role->naziv_role !== 'Menadžer')
        {
            abort(403, 'Nemate dozvolu za pristup.');
        }

        //azurira status odabrane rezervacije
        $rez=Rezervacija::findOrFail($id);
        if($rez->status->naziv_statusa=="Izvršena")
        {
            return back()->with('error','Ne mozete azurirati ovu rezervaciju');
        }
        $rez->update($request->only(['status_id']));
        $rez->save();

        $request->session()->flash('rezervacija.id', $rez->id);

        return redirect()->route('manager.index');
    }
}
