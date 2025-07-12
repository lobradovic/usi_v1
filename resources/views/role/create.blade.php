
@extends('layouts.app')

@section('content')

<div class="form">
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="formField">
            <label for="">Naziv role:</label>
            <input type="text" name="naziv_role">
        </div>
        <div class="formField">
            <button type="submit">Potvrdi</button>
        </div>
    </form>
</div>
@endsection

