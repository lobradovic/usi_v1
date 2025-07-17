@extends('layouts.app')
@section('content')
<div class="content">
    <h1>Novo jelo</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        <form action="{{ route('jelos.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="">Naziv jela: </label></td>
                <td><input type="text" name="naziv_jela"></td>
            </tr>
            <tr>
                <td><label for="">Cena:</label></td>
                <td><input type="text" name="cena"></td>
            </tr>
            <tr>
                <td><label for="">Opis:</label></td>
                <td><textarea name="" id="" name="opis"></textarea></td>
            </tr>
            <tr><td><button type="submit" class="dugme">Potvrdi</button></td></tr>
        </table>
    </form>
</div>
@endsection
