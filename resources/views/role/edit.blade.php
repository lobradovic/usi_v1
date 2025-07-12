@extends('layouts.app')

@section('content')
<div class="form">
    <form action="{{ route('roles.update',$role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="formField">
            <label for="">Naziv role:</label>
            <input type="text" name="naziv_role" value="{{ old('naziv_role', $role->naziv_role) }}">
        </div>
        <div class="formField">
            <button type="submit">Izmeni</button>
        </div>
    </form>
</div>
@endsection

