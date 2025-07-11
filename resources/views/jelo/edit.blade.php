@extends('layouts.app')

@section('content')
<form action="{{ route('jelos.update', $jelo->id) }}" method="POST">
    @csrf
    @method('PUT') {{-- ili PATCH, po dogovoru --}}

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="formField">
        <label for="naziv_jela">Naziv jela</label>
        <input type="text" name="naziv_jela" id="naziv_jela" value="{{ old('naziv_jela', $jelo->naziv_jela) }}">
    </div>

    <div class="formField">
        <label for="cena">Cena</label>
        <input type="number" name="cena" id="cena" value="{{ old('cena', $jelo->cena) }}">
    </div>

    <div class="formField">
        <label for="opis">Opis</label>
        <textarea name="opis" id="opis">{{ old('opis', $jelo->opis) }}</textarea>
    </div>

    <div class="formField">
        <button type="submit">Sačuvaj izmene</button>
    </div>
</form>
@endsection

