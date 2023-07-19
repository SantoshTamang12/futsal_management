@extends('layouts.app')

<title>Login</title>
@section('content')
    <div class="container my-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 shadow p-3">

                <h1>Login page</h1><br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row-mb-4 mb-3 w-100">
                        <label for="email" class="col-md-4-col-form-label-text-md-end">{{ __('Email Address') }}</label>

                        <div class="">
                            <input id="email" type="email"
                                class="form-control w-100 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row-mb-4 mb-3 w-100">
                        <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>

                        <div class="">
                            <input id="password" type="password"
                                class="form-control w-100 @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row-mb-3 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="row-mb-0">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button><br>


                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/player.png') }}" class="player" alt="animated football player">
            </div>
        </div>
    </div>
@endsection
