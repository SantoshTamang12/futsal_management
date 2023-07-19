<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="{{asset('css of fyp/About Us.css')}}" />
    
    <link rel="shorcut icon" href="{{ asset('images/logo.png') }}">
</head>
<body>
    <nav>
        <div class="navigation>">
            
        </div>
        
            <ul>
            <li><a href="{{ url('home') }}">Home</a></li> 
                <li><a href="#">Search</a></li> 
                <li><a href="#">Venue</a></li> 
                <li ><a href="{{ url('my booking page') }}">My bookings</a></li>
                <li ><a href="{{ url('login') }}">Profile</a></li>
               </ul>
       <img src="{{ asset('images/logo.png') }}" alt="" class="logo">
    </nav>
    <div class="container">
        @yield('content')
</div>
</body>
</html>