@extends('layouts.app')
@section('content')
<div class="content">
    <h1>Novo jelo</h1>
        <form action="{{ route('jelos.store') }}" method="POST">
        @csrf
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
            <label for="">Naziv jela</label>
            <input type="text" name="naziv_jela">
        </div>
        <div class="formField">
            <label for="">Cena</label>
            <input type="number" name="cena">
        </div>
        <div class="formField">
            <label for="">Opis</label>
            <textarea type="text" name="opis"></textarea>
        </div>
        <div class="formField">
            <button type="submit">Unos</button>
        </div>
    </form>
</div>
@endsection
