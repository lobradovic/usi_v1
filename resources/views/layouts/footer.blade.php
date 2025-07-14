<div class="footer d-flex justify-content-around">
    <div class="footCol">
        <img src="{{ asset('images/lanabelipng2.webp') }}" alt="logo">
    </div>
    <div class="footCol d-flex flex-column">
        <h3>Korisni linkovi</h3>
        @if(auth())
            <a href="">Početna</a>
            <a href="">Moje rezervacije</a>
            <a href="">Korpa</a>
            <a href="">Logout</a>
        @else
            <a href="">Login</a>
            <a href="">Registracija</a>
        @endif
    </div>
    <div class="footCol d-flex flex-column">
        <h3>Društvene mreže</h3>
        <a href="">Github</a>
        <a href="">LinkedIn</a>
        <a href="">Instagram</a>
        <a href="">RAF - zvanična stranica</a>
    </div>
</div>