
    @extends('layouts.app')

    @section('content')
        <h1>Moje rezervacije</h1>
        @if($rezervacijas->isEmpty())
        <p>Nema rezervacija.</p>
        @else
        <div class="table">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Adresa</th>
                    <th>Datum</th>
                    <th>Status</th>
                    <th>Opcije</th>
                </thead>
                <tbody>
                    @foreach($rezervacijas as $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->adresa }}</td>
                        <td>{{ $r->datum }}</td>
                        <td>{{ $r->status->naziv_statusa }}</td>
                        <td><a href="{{ route('rezervacijas.edit',$r->id) }}">Detalji</a></td>
                        <td><a href="{{ route('rezervacijas.destroy',$r->id) }}">Otkazi</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    @endsection

