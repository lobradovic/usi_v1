<div class="footer d-flex justify-content-around">
    <div class="footCol">
            <div class="logo"><img src="{{ asset('images/lanabelipng2.webp') }}" alt="logo"></div>
    </div>
    <div class="footCol d-flex flex-column">
        <h3>Korisni linkovi</h3>
        <a href="{{ route('home') }}">Početna</a>
        @auth

            <a href="{{ route('rezervacijas.index') }}">Moje rezervacije</a>
            <a href="{{ route('korpa.prikazi') }}">Korpa</a>
            <form action="{{ route('logout') }}" class="logout" method="post">
                <button type="submit">Logout</button>
            </form>
        @if(auth()->user()->role->naziv_role=="Admin")
            <a href="{{ route('admin.index') }}">Admin</a>
        
        @elseif(auth()->user()->role->naziv_role=="Menadžer")
            <a href="{{ route('manager.index') }}">Menadžer</a>
        @endif
        @endauth
        @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Registracija</a>
        @endguest
    </div>
    <div class="footCol d-flex flex-column">
        <h3>Društvene mreže</h3>
        <a href="https://github.com/lobradovic/usi_v1">Github</a>
        <a href="https://www.linkedin.com/in/luka-obradovi%C4%87-7153a525b/">LinkedIn</a>
        <a href="https://www.instagram.com/luka_obradovic5">Instagram</a>
        <a href="https://raf.edu.rs/">RAF - zvanična stranica</a>
    </div>
</div>