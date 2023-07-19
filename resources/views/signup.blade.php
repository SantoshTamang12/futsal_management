@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{ asset('css of fyp/signup.css') }}" />
@endsection
@section('content')
    <div class="container my-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 shadow p-3">

                <form class="wrapper" method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-center">Sign up</h1>
                    <div class="form-group d-flex align-items-center mb-4">
                        <img src="{{ asset('images/uicon.png') }}" class="icon" alt="">
                        <input type="text" placeholder="Name" class="w-100" name="name" id="name">
                    </div>
                    <div class="form-group d-flex align-items-center mb-4">
                        <img src="{{ asset('images/calendar.png') }}" class="calendaricon" alt="calendaricon">
                        <input type="date" id="birthday" class="w-100" name="dob" class="calen">
                    </div>
                    <div class="form-group d-flex align-items-center mb-4">
                        <img src="{{ asset('images/Secured Letter.png') }}" class="icon" alt="">
                        <input type="email" placeholder="E-mail" class="w-100" name="email" id="email">
                    </div>
                    <div class="form-group d-flex align-items-center mb-4">
                        <img src="{{ asset('images/passicon.png') }}" class="passicon" alt="">
                        <input type="password" placeholder="Password" class="w-100" name="password" id="password">
                    </div>
                    <div class="form-group d-flex align-items-center mb-4">
                        <img src="{{ asset('images/Visit.png') }}" class="visiticon" alt="">
                        <input type="text" placeholder="Location" class="w-100" name="location" id="location">
                    </div>
                    <div class="form-group d-flex align-items-center mb-4">
                        <img src="{{ asset('images/Call.png') }}" class="callicon" alt="">
                        <input type="tel" placeholder="Phone Number" class="w-100" name="phone" id="phone_number">
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user icon">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <select id="user" class="w-100" name="user" value="{{ old('user') }}" required
                            autocomplete="user">
                            <option>Select type of user</option>
                            <option value="customer">Customer</option>
                            <option value="futsal">Futsal</option>
                        </select>

                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-image icon">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                            </rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                        <input id="image" type="file" class="w-100" name="image" value="{{ old('image') }}"
                            required autocomplete="image">
                    </div>


                    <div class="text-center">
                        <input type="submit" class="butt">
                    </div>
                </form>

            </div>
            <div class="col-md-6"> <img src="{{ asset('images/player.png') }}" class="img"
                    alt="animated football player">
            </div>


        </div>
    </div>
@endsection
