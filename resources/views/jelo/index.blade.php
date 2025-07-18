@extends('layouts.app')

@section('content')
    <div class="content">
        <h1>Prikaz svih jela</h1>

        <div class="menu">
            @foreach($jelos as $j)
                <div class="menuItem">
                    <div class="topPart">
                        <h4>{{ $j->naziv_jela }}</h4>
                        <p>{{ $j->cena }}</p>
                        <p>{{ $j->opis }}</p>
                    </div>
                    @auth()
                        <form method="POST" action="{{ route('korpa.dodaj', $j->id) }}">
                            @csrf
                            <button type="submit" class="dugme">Dodaj u korpu</button>
                        </form>
                    @endauth
                    @guest
                    <p><strong>Morate biti ulogovani za dodavanje u korpu</strong></p>
                    @endguest
                </div>
            @endforeach
        </div>
    </div>
@endsection
