@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Izmena statusa</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="form">
    <form action="{{ route('statuses.update',$status->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td><label for="">Naziv role:</label></td>
                <td><input type="text" name="naziv_statusa" value="{{ old('naziv_statusa', $status->naziv_statusa) }}"></td>
            </tr>
            <tr><td><button type="submit" class="dugme">Potvrdi</button></td></tr>
        </table>
    </form>
</div>
</div>
@endsection

