@extends('layouts.app')

@section('content')
<h1>Tvoja korpa</h1>
@if(empty($korpa))
    <p>Korpa je prazna.</p>
@else
    <ul>
        @foreach($korpa as $id => $item)
            <li>
                {{ $item['naziv_jela'] }} - {{ $item['cena'] }} RSD
                {{ $item['opis'] }}
                <form method="POST" action="{{ route('korpa.obrisi', $id) }}" style="display:inline;">
                    @csrf
                    <button type="submit">Ukloni</button>
                </form>
            </li>
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