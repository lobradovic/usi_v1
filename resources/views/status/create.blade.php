
@extends('layouts.app')

@section('content')

<div class="form">
    <form action="{{ route('statuses.store') }}" method="POST">
        @csrf
        <div class="formField">
            <label for="">Naziv statusa:</label>
            <input type="text" name="naziv_statusa">
        </div>
        <div class="formField">
            <button type="submit">Potvrdi</button>
        </div>
    </form>
</div>
@endsection