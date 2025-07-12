@extends('layouts.app')

@section('content')
    <div class="form">
        <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h3>Ime i prezime: {{ $user->name  }} {{ $user->surname }}</h3>
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
                <button type="submit">Potvrdi</button>
            </div>     
        </form>
    </div>
@endsection

