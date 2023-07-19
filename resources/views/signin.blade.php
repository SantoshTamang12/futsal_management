@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{ asset('css of fyp/login.css') }}" />
@endsection

@section('content')
    <div class="container my-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 shadow p-3">

                <h1 class="text-center">Log in</h1>
                <form acion="{{ route('login') }}" method="POST">
                    @csrf
                    <img src="{{ asset('images/uicon.png') }}" class="icon" alt="">
                    <input type="email" name="email" class="w-100" placeholder="E-mail"><br>
                    <img src="{{ asset('images/passicon.png') }}" class="passicon" alt="">
                    <input type="password" name="password" class="w-100" placeholder="Password">
                    {{-- <div class="recover">
        <a href="#">Forgot password?
</a>
        </div> --}}

                    <div class="w-100 d-flex justify-content-center align-items-center">
                        <button type="submit" class="">Sign In</button>
                        <div class="signup mt-4 mx-3">
                            Or <a href="{{ route('register') }}">Sign up</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6 ">

                <img src="{{ asset('images/player.png') }}" class="img" alt="animated football player">
            </div>
        </div>
    </div>
@endsection
