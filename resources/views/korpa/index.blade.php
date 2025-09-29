@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Korpa</h1>
    <div class="pageButtons d-flex">
        <a href="{{ route('jelos.index') }}" class="dugme razdvoj">Dodaj</a>
        <form action="{{ route('korpa.isprazni') }}" method="post">
            @csrf
            <button class="dugme" type="submit"> Poništi</button>
        </form>
    </div>
    <div class="cart">
            <div class="cartItems">
                @if(empty($korpa))
                <h4>Korpa je prazna.</h4>
                @else
                    @foreach($korpa as $id => $stavka)
                        <div>
                            <h4>{{ $stavka['naziv_jela'] }}</h4>
                            <p>Cena: {{ $stavka['cena'] }} RSD</p>
                            <p>Opis: {{ $stavka['opis'] }}</p>

                            <form action="{{ route('korpa.izmeniKolicinu', $id) }}" method="POST">
                                @csrf
                                <input type="number" name="kolicina" value="{{ $stavka['kolicina'] }}" min="0" />
                                <button type="submit" class="dugme">Izmeni količinu</button>
                            </form>
                            <form action="{{ route('korpa.obrisi',$id) }}" method="POST">
                                @csrf
                                <button type="submit" class="dugme">Ukloni</button>
                            </form>
                        </div>
                    @endforeach
            </div>
            <div class="form">
                <h4>Detalji o rezervaciji</h4>
                @if($errors->any())
                    <ul>
                        @foreach ($errors->all() as $greska)
                            <li>{{ $greska }}</li>
                        @endforeach
                    </ul>
                @endif
                <form method="POST" action="{{ route('korpa.izvrsi') }}">
                    @csrf
                    <table>
                        <tr>
                            <td><label for="">Datum porudzbine</label></td>
                            <td><input type="date" name="datum"></td>
                        </tr>
                        <tr>
                            <td><label for="">Adresa</label></td>
                            <td><input type="text" name="adresa"></td>
                        </tr>
                        <tr>
                            <td><button type="submit" class="dugme">Izvrši porudžbinu</button></td>
                        </tr>
                    </table>
                </form>
                <h2>Ukupno: {{ $total }} RSD</h2>
                
            </div>
        @endif

    </div>
</div>
@endsection