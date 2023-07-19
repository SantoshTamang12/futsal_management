<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js"
        integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    @yield('head')
    {{-- $notifications = auth('admin')->user()->unreadNotifications()->get(); --}}

</head>

<body>
    @if (session('message'))
        <div class="alert alert-success" role="alert" align="center">{{ session('message') }}</div>
    @endif
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{--
                <div class="input-group" style="padding-left: 12px">
                    <form class="d-flex" role="search" type="get">
                        <input class="form-control me-2" name="search" type="search" placeholder="search Futsal"
                            aria-label="search" style="margin:0;" rquired>
                        <button class="btn btn-outline-success" type="submit" style="margin:0;">Search</button>
                    </form>
                </div> --}}

                <div class="collapse  nav-sm shadow" id="navbarSupportedContent">
                    <div class=" p-4 d-flex flex-column ">
                        @if (auth()->check() && auth()->user()->role == 'Futsal')
                            <li class="mx-3 list-style-none mb-3"><a class="nav_link ml-3"
                                    href="{{ route('futsal.dashboard') }}">Dashboard</a></li>
                            <li class="mx-3 list-style-none mb-3"><a class="nav_link ml-3"
                                    href="{{ route('futsal.bookings.index') }}">Bookings</a></li>
                            <li class="mx-3 list-style-none mb-3"><a class="nav_link ml-3"
                                    href="{{ route('futsal.timings.index') }}">Timings</a></li>
                            <li class="mx-3 list-style-none mb-3"><a class="nav_link ml-3"
                                    href="{{ route('futsal.notifications.index') }}">Notifications</a></li>
                        @elseif(auth()->check() && auth()->user()->role == 'Customer')
                            <li class="mx-3 list-style-none mb-3"><a class="nav_link ml-3"
                                    href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                            <li class="mx-3 list-style-none mb-3"><a class="nav_link ml-3"
                                    href="{{ route('customer.bookings.index') }}">My Bookings</a></li>
                        @endif

                        <li class="mx-3 mb-3"><a class="nav_link" href="{{ route('venues') }}">Venues</a></li>
                        @auth('web')
                            <li class="mx-3"><a class="nav_link " href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                    Logout
                                </a></li>
                        @else
                            @if (Route::has('login'))
                                <li class="list-style-none mb-3">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="list-style-none p">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endauth

                    </div>
                </div>
            </div>
            <div class="d-none d-md-block collapse navbar-collapse d-flex justify-content-end flex-grow-1"
                id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto d-flex align-items-center">

                    @if (auth()->check() && auth()->user()->role == 'Futsal')
                        <li class="mx-3"><a class="nav_link ml-3"
                                href="{{ route('futsal.dashboard') }}">Dashboard</a></li>
                        <li class="mx-3"><a class="nav_link ml-3"
                                href="{{ route('futsal.bookings.index') }}">Bookings</a></li>
                        <li class="mx-3"><a class="nav_link ml-3"
                                href="{{ route('futsal.timings.index') }}">Timings</a></li>
                        <li class="mx-3"><a class="nav_link ml-3"
                                href="{{ route('futsal.notifications.index') }}">Notifications</a></li>
                    @elseif(auth()->check() && auth()->user()->role == 'Customer')
                        <li class="mx-3"><a class="nav_link ml-3"
                                href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                        <li class="mx-3"><a class="nav_link ml-3"
                                href="{{ route('customer.bookings.index') }}">Bookings</a></li>
                    @endif

                    <li class="mx-3"><a class="nav_link ml-3" href="{{ route('venues') }}">Venues</a></li>

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="mx-3"><a class="nav_link ml-3" href="{{ route('login') }}">Login</a></li>
                        @endif

                        @if (Route::has('register'))
                            <li class="mx-3"><a class="nav_link ml-3" href="{{ route('register') }}">Register</a></li>
                        @endif
                    @else
                        <li class="mx-3 dropdown">
                            <a id="navbarDropdown" class="nav_link ml-3 dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end shadow bg-white" aria-labelledby="navbarDropdown">
                                @if (auth()->check() && auth()->user()->role == 'Futsal')
                                    <a class="dropdown-item" href="{{ route('futsal.gallery') }}">Gallery</a>
                                @elseif (auth()->check() && auth()->user()->role == 'Customer')
                                    <a class="dropdown-item"
                                        href="{{ route('customer.test', [($id = auth()->user()->id)]) }}">Update
                                        profile</a>
                                @endif
                                @auth('admin')
                                    <div class="d-block d-md-none">

                                        @if (auth()->check() && auth()->user()->role == 'Futsal')
                            <li class="mx-3"><a class="nav_link ml-3" href="{{ route('futsal.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="mx-3"><a class="nav_link ml-3"
                                    href="{{ route('futsal.bookings.index') }}">Bookings</a></li>
                            <li class="mx-3"><a class="nav_link ml-3"
                                    href="{{ route('futsal.timings.index') }}">Timings</a></li>
                        @elseif(auth()->check() && auth()->user()->role == 'Customer')
                            <li class="mx-3"><a class="nav_link ml-3"
                                    href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                            <li class="mx-3"><a class="nav_link ml-3" href="{{ route('customer.bookings.index') }}">My
                                    Bookings</a></li>
                            @endif

                            <li class="mx-3"><a class="nav_link ml-3" href="{{ route('venues') }}">Venues</a></li>
                    </div>

                    <a class="dropdown-item  pr-2 " href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>
                @endauth
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        </div>
        </li>
    @endguest
    </ul>
    </div>
    </div>
    </nav>

    <div class="container mt-3">
        @foreach ($errors->all() as $error)
            <div class="alert  text-center alert-danger">
                {{ $error }}
            </div>
        @endforeach
    </div>

    @if (session('success'))
        <div class="alert  text-center alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert  text-center alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <main class="">
        @yield('content')
    </main>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @stack('js')
</body>

</html>
