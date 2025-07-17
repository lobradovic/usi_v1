@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Prikaz svih rola</h1>
        <div class="pageButtons d-flex">
            <a href="{{route('roles.create')}}" class="dugme">Nova rola</a>
        </div>
    <div class="table">
        <table>
            <thead>
                <th>ID</th>
                <th>Naziv</th>
                <th colspan="2">Opcije</th>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->naziv_role }}</td>
                    <td><a href="{{ route("roles.edit", $role->id) }}" class="dugme">Izmeni</a></td>
                    <td>
                        <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dugme">Obriši</button>
                        </form>      
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
