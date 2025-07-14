@extends('layouts.app')

@section('content')
<h1>Tvoja korpa</h1>
@if(empty($korpa))
    <p>Korpa je prazna.</p>
@else
    <ul>
        @foreach($korpa as $id => $stavka)
            <div>
                <h4>{{ $stavka['naziv_jela'] }}</h4>
                <p>Cena: {{ $stavka['cena'] }} RSD</p>
                <p>Opis: {{ $stavka['opis'] }}</p>

                <form action="{{ route('korpa.izmeniKolicinu', $id) }}" method="POST">
                    @csrf
                    <input type="number" name="kolicina" value="{{ $stavka['kolicina'] }}" min="0" />
                    <button type="submit">Izmeni količinu</button>
                </form>
            </div>
        @endforeach
    </ul>
    <form method="POST" action="{{ route('korpa.izvrsi') }}">
        @csrf
        <label for="">Datum porudzbine</label>
        <input type="date" name="datum">
        </br>
        
        <label for="">Adresa</label>
        <input type="text" name="adresa">
        <button type="submit">Izvrši porudžbinu</button>
    </form>
@endif

<a href="{{ route('jelos.index') }}">Nazad na jelovnik</a>
@endsection