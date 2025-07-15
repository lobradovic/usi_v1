@extends('layouts.app')

@section('content')
    <div class="content">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="loginDiv">
                <div class="logo mb-3">
                    <img src="{{ asset('images/lanabelipng2.webp') }}" alt="logo">
                </div>
                <div class="form">
                    <div class="formField">
                        <label for="email">{{ __('E-mail adresa') }}</label>
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror                      
                    </div>
                    <div class="formField">
                        <label for="password">{{ __('Lozinka') }}</label>
                        <input id="password" type="password" class="@error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="formField">
                        <button type="submit" class="dugme">{{__('Login')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection