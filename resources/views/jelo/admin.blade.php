@extends('layouts.app')

@section('content')
<div class="content">
        <h1>Lista jela</h1>
        <a href="{{ route('jelos.create') }}" class="dugme">Dodaj novo</a>

    <table class="table">
        <thead>
            <tr>
                <th>Naziv jela</th>
                <th>Cena</th>
                <th>Opis</th>
                <th colspan="2">Opcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jelos as $jelo)
                <tr>
                    <td>{{ $jelo->naziv_jela }}</td>
                    <td>{{ $jelo->cena }}</td>
                    <td>{{ $jelo->opis }}</td>
                    <td><a href={{ route('jelos.edit',$jelo->id) }} class="dugme">Izmeni</a></td>
                    <td>
                        <form method="POST" action="{{ route('jelos.destroy', $jelo->id) }}">
                            @csrf
                            <button type="submit" class="dugme">Obrisi</button>
                        </form>                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
