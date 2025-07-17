
    @extends('layouts.app')

    @section('content')
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
            <div class="formField">
                <label for="">Adresa</label>
                <input type="text" name="adresa" value="{{ $rezervacija->adresa }}">
            </div>
            <div class="formField">
                <label for="">Datum</label>
                <input type="date" name="datum" value="{{ $rezervacija->datum->format('Y-m-d') }}">
            </div>
            <div class="formField">
                <button type="submit">Potvrdi</button>
            </div>
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
    @endsection

