@extends('layouts.app')

@section('content')
<h1>Menadžer</h1>
<div class="table">
    <table>
        <thead>
            <th>ID</th>
            <th>Ime klijenta</th>
            <th>Prezime klijenta</th>
            <th>Telefon</th>
            <th>Adresa</th>
            <th>Datum</th>
            <th>Status</th>
            <th>Opcije</th>
        </thead>
        <tbody>
            @foreach($rez as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->user->name }}</td>
                <td>{{ $r->user->surname }}</td>
                <td>{{ $r->user->phone }}</td>
                <td>{{ $r->adresa }}</td>
                <td>{{ $r->datum }}</td>
                <td>{{ $r->status->naziv_statusa }}</td>
                <td><a href="{{ route('manager.edit',$r->id) }}">Detalji</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection