@extends('layouts.app')

@section('content')
    <h1>Lista jela</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Naziv jela</th>
                <th>Cena</th>
                <th>Opis</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jelos as $jelo)
                <tr>
                    <td>{{ $jelo->naziv_jela }}</td>
                    <td>{{ $jelo->cena }}</td>
                    <td>{{ $jelo->opis }}</td>
                    <td><a href={{ route('jelos.edit',$jelo->id) }}>Izmeni</a></td>
                    <td>
                        <form method="POST" action="{{ route('jelos.destroy', $jelo->id) }}">
                            @csrf
                            <button type="submit">Obrisi</button>
                        </form>                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
