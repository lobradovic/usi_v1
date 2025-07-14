<nav class="">
    <div class="nav d-flex">
        <div class="leftNav">
            <div class="logo"><img src="{{ asset('images/lanabelipng2.webp') }}" alt="logo"></div>
        </div>
        <div class="rightNav">

                    <a href="{{ route('home') }}" class="dugme">Početna</a>
                @auth

                    <a href="{{ route('rezervacijas.index') }}" class="dugme">Moje rezervacije</a>
                    <a href="{{ route('korpa.prikazi') }}" class="dugme">Korpa</a>

                    @if(auth()->user()->role->naziv_role === 'Admin')

                        <a href="{{ route('admin.index') }}" class="dugme">Admin</a>

                    @elseif(auth()->user()->role->naziv_role === 'Menadžer')

                        <a href="{{ route('manager.index') }}" class="dugme">Menadžer</a>

                    @endif

                @endauth
                @guest


                        <a class="dugme" href="{{ route('login') }}">{{ __('Login') }}</a>

                    @if (Route::has('register'))

                            <a class="dugme" href="{{ route('register') }}">{{ __('Registracija') }}</a>

                    @endif
                @else

                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dugme">Logout</button>
                            </form>
                        </div>

                @endguest

        </div>
    </div>
</nav>