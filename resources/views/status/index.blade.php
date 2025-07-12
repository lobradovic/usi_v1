@extends('layouts.app')

@section('content')
    <h1>Prikaz svih statusa</h1>
<div class="table">
    <table>
        <thead>
            <th>ID</th>
            <th>Naziv</th>
            <th colspan="2">Opcije</th>
        </thead>
        <tbody>
            @foreach($statuses as $status)
            <tr>
                <td>{{ $status->id }}</td>
                <td>{{ $status->naziv_statusa }}</td>
                <td><a href="{{ route("statuses.edit", $status->id) }}">Update</a></td>
                <td>
                    <form method="POST" action="{{ route('statuses.destroy', $status->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>      
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
