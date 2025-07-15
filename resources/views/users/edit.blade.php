@extends('layouts.app')

@section('content')
    <div class="content">
        <h1>Podaci o korisniku</h1>
        <div class="form">
        <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h4>Ime i prezime: {{ $user->name  }} {{ $user->surname }}</h4>
            <p>E-mail: {{ $user->email }}</p>
            <p>Telefon: {{ $user->phone }}</p>
            <div class="formField">
                <label for="">Rola: </label>
                    <select name="role_id" id="role_id">
                        <option value="">-- Odaberi rolu --</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                {{ $role->naziv_role }}
                            </option>
                        @endforeach
                    </select>
            </div>
            <div class="formField">
                <button type="submit" class="dugme">Potvrdi</button>
            </div>     
        </form>
    </div>
    </div>
@endsection

