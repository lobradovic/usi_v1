@extends('layouts.app')

@section('content')
    <div class="content">
        <h1>Podaci o korisnicima</h1>
        <div class="table">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>E-mail</th>
                    <th>Broj telefona</th>
                    <th>Rola</th>
                    <th colspan="2">Opcije</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surname}}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{$user->role->naziv_role}}</td>
                        <td><a href="{{ route('users.edit',$user->id) }}" class="dugme">Promeni rolu</a></td>
                        <td>
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dugme">Obrisi</button>
                            </form>    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

