
@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Detalji o rezervaciji</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="form">
        <form action="{{ route('rezervacijas.update',$rezervacija->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <td><label for="">Adresa:</label></td>
                    <td><input type="text" name="adresa" value="{{ $rezervacija->adresa }}"></td>
                </tr>
                <tr>
                    <td><label for="">Datum:</label></td>
                    <td><input type="date" name="datum" value="{{ $rezervacija->datum->format('Y-m-d') }}"></td>
                </tr>
                <tr>
                    <td><button type="submit" class="dugme">Potvrdi</button></td>
                </tr>
            </table>
        </form>
    </div>
    <h2>Stavke rezervacije</h2>
    <div class="table">
        <table>
            <thead>
                <th>ID</th>
                <th>Naziv</th>
                <th>Kolicina</th>
                <th>Cena</th>
            </thead>
            <tbody>
                @foreach($rezervacija->stavkas as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->jelo->naziv_jela }}</td>
                        <td>{{ $s->kolicina }}</td>
                        <td>{{ $s->trenutna_cena }}</td>
                    </tr>
                @endforeach                
            </tbody>
        </table>
    </div>
</div>
@endsection

