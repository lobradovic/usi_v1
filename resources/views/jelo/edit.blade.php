@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Izmena jela</h1>
    @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    @endif
    <form action="{{ route('jelos.update', $jelo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td><label for="">Naziv jela:</label></td>
                <td><input type="text" name="naziv_jela" id="naziv_jela" value="{{ old('naziv_jela', $jelo->naziv_jela) }}"></td>
            </tr>
            <tr>
                <td><label for="">Cena:</label></td>
                <td><input type="number" name="cena" id="cena" value="{{ old('cena', $jelo->cena) }}"></td>
            </tr>
            <tr>
                <td><label for="">Opis:</label></td>
                <td><textarea name="opis" id="opis">{{ old('opis', $jelo->opis) }}</textarea></td>
            </tr>
            <tr><td><button type="submit" class="dugme">Potvrdi</button></td></tr>
        </table>
    </form>
</div>
@endsection

