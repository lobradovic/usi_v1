@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="loginDiv">
            <div class="logo mb-3">
                <img src="{{ asset('images/lanabelipng2.webp') }}" alt="logo">
            </div>
            <div class="form">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="formField">
                        <label for="name">{{ __('Ime') }}</label>
                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="formField">
                        <label for="surname">{{ __('Prezime') }}</label>
                        <input id="surname" type="text" class=" @error('surname') is-invalid @enderror" name="surname"
                            value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="formField">
                        <label for="phone">{{ __('Broj telefona') }}</label>
                        <input id="phone" type="text" class=" @error('phone') is-invalid @enderror" name="phone"
                            value="{{ old('phone') }}" required autocomplete="name" autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="formField">
                        <label for="email">{{ __('E-mail') }}</label>
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="formField">
                        <label for="password">{{ __('Lozinka') }}</label>
                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                            required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="formField">
                        <label for="password-confirm">{{ __('Potvrdite lozinku') }}</label>
                        <input id="password-confirm" type="password" class="" name="password_confirmation" required
                            autocomplete="new-password">
                    </div>
                    <div class="formField"><button type="submit" class="dugme">{{ __('Registracija') }}</button></div>
                </form>
            </div>
        </div>
@endsection