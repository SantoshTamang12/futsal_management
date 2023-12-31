<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css of fyp/About Us.css') }}" />

    <link rel="shorcut icon" href="{{ asset('images/logo.png') }}">
</head>

<body>
    <nav>
        <div class="navigation>">

        </div>

        <ul>
            <li><a href="{{ url('home') }}">Home</a></li>
            <li><a href="#">Search</a></li>
            <li><a href="{{ url('profileuser') }}">Profile</a></li>
            <li><a href="{{ url('my booking page') }}">My bookings</a></li>
            <!-- <li ><a href="{{ url('login') }}">Login</a></li> -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

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
        <img src="{{ asset('images/logo.png') }}" alt="" class="logo">
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
