@extends('layouts.app')

@section('content')
<h1>Podaci o rezervaciji</h1>

<p>ID rezervacije: {{ $rez->id }}</p>
<p>Ime klijenta: {{ $rez->user->name }}</p>
<p>Prezime klijenta: {{ $rez->user->surname }}</p>
<p>Telefon: {{ $rez->user->phone }}</p>
<p>Adresa: {{ $rez->adresa }}</p>
<p>Datum: {{ $rez->datum }}</p>
<div class="form">
    <form action="{{ route('manager.update',$rez->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="formField">
            <label for="">Status rezervacije</label>
            <select name="" id=""></select>
        </div>
        <div class="formField">
            <button type="submit">Potvrdi</button>
        </div>
    </form>
</div>

@endsection