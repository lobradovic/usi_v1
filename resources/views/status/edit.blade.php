@extends('layouts.app')

@section('content')
<div class="form">
    <form action="{{ route('statuses.update',$status->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="formField">
            <label for="">Naziv role:</label>
            <input type="text" name="naziv_statusa" value="{{ old('naziv_statusa', $status->naziv_statusa) }}">
        </div>
        <div class="formField">
            <button type="submit">Izmeni</button>
        </div>
    </form>
</div>
@endsection

