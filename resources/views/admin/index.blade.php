@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Admin stranica</h1>
    <div class="admin d-flex">
        <div class="adminLevo">
            <a href="{{ route('users.index') }}" class="dugme">Podaci o korisnicima</a>
            <a href="{{ route('jelos.index') }}" class="dugme">Podaci o jelima</a>
            <a href="{{ route('roles.index') }}" class="dugme">Podaci o rolama</a>
            <a href="{{ route('statuses.index') }}" class="dugme">Podaci o statusima rezervacije</a>
        </div>
        <div class="adminDesno">
            <h3>Dobrodošli na administratorsku kontrolnu tablu</h3>
            <p>Efikasno upravljajte korisnicima, jelovnikom i podešavanjima sistema.</p>
            <p>Na ovoj stranici možete:</p>
            <ul>
                <li>Pregledati i uređivati korisničke podatke, uključujući promenu rola</li>
                <li>Upravljati jelovnikom, dodavanjem, izmenom i brisanjem jela</li>
                <li>Konfigurisati uloge korisnika za preciznu kontrolu pristupa</li>
                <li>Definisati i prilagoditi statuse rezervacija prema potrebama sistema</li>
            </ul>
        </div>
    </div>
</div>
@endsection
