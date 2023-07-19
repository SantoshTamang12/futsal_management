@extends('layouts.app')
<title>Sign up</title>
@section('content')
<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 shadow p-3">
            <h1>Sign up</h1>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3 w-100">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }} <span class="text-danger">*</span></label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control w-100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3 w-100">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }} <span class="text-danger">*</span></label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }} <span class="text-danger">*</span></label>

                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>

                    <div class="col-md-8">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone number') }} <span class="text-danger">*</span></label>

                    <div class="col-md-8">
                        <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            
                <div class="row mb-3">
                    <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Address') }} <span class="text-danger">*</span></label>

                    <div class="col-md-8">
                        <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required autocomplete="location">

                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="user" class="col-md-4 col-form-label text-md-end">{{ __('Type of user') }} <span class="text-danger">*</span></label>

                    <div class="col-md-8">
                        <select id="user" class="form-control" name="user" value="{{ old('user') }}" required autocomplete="user">
                        <option>Select type of user</option>
                        <option value="customer">Customer</option>
                        <option value="futsal">Futsal</option>
                        </select>
                        @error('user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }} <span class="text-danger">*</span></label>

                    <div class="col-md-8">
                        <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}" required autocomplete="image">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/player.png') }}" class="player" alt="animated football player">
        </div>
    </div>
</div>
@endsection
