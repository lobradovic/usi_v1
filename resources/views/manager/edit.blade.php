@extends('layouts.app')

@section('content')
<h1>Podaci o rezervaciji</h1>

 
    <p>ID rezervacije: {{ $rezervacija->id }}</p>
    <p>Ime klijenta: {{ $rezervacija->user->name }}</p>
    <p>Prezime klijenta: {{ $rezervacija->user->surname }}</p>
    <p>Telefon: {{ $rezervacija->user->phone }}</p>
    <p>Adresa: {{ $rezervacija->adresa }}</p>
    <p>Datum: {{ $rezervacija->datum }}</p>

    <form action="{{ route('manager.update',$rezervacija->id) }}" method="POST">
        <div class="form">
            @csrf
            @method('PUT')

        <input type="hidden" name="id" value="{{ $rezervacija->id }}">
        <input type="hidden" name="user_id" value="{{ $rezervacija->user_id }}">
        <input type="hidden" name="adresa" value="{{ $rezervacija->adresa }}">
        <input type="hidden" name="datum" value="{{ $rezervacija->datum->format('Y-m-d') }}">

        <div class="formField">
            <label for="">Status rezervacije</label>
            <select name="status_id" id="">
                @foreach($status as $s)
                <option value="{{$s->id }}"  {{ $s->id == $rezervacija->status_id ? 'selected' : '' }}>{{$s->naziv_statusa  }} </option>
                @endforeach
            </select>
        </div>
        <div class="formField">
            <button type="submit">Potvrdi</button>
        </div>
    </form>
</div>

@endsection