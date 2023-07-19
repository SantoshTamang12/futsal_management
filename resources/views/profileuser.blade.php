<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{asset('css of fyp/profileuser.css')}}" />
    <link rel="shorcut icon" href="{{ asset('images/logo.png') }}">
</head>
<body>
    <nav>
        <div class="navigation>">
            
        </div>
        
            <ul>
            <li><a href="C:\Users\User\FYP\Home page\homepage.html">Home</a></li> 
                <li><a href="#">Search</a></li> 
                <li><a href="#">Venue</a></li> 
                <li ><a href="#">My bookings</a></li>
                <li ><a href="C:\Users\User\FYP\login page\login.html">Login</a></li>
               </ul>
       <img src="{{ asset('images/logo.png') }}" alt="" class="logo">
    </nav>

    <form class ="wrapper">
        <h1>Profile</h1>
        <form acion="#">
        <h1 class="namety">Name</h1>
        <input type="text" placeholder="Name"><br>
        <h1 class="datety">DOB</h1>
        <input type="date" id="birthday" name="birthday" class="calen"><br>
        <h1 class="emailty">E-mail</h1>
        <input type="email" placeholder="E-mail"><br>
        <h1 class="passwordty">Password</h1>
        <input type="password" placeholder="Password"><br>
        <h1 class="locationty">Location</h1>
        <input type="location" placeholder="Location"><br>
        <h1 class="namety">Name</h1>
        <input type="tel" placeholder="Phone Number">
    <button>Edit</button>
    
        </form>
        <div class="profilepic">
<img src="{{ asset('images/logo.png') }}" id="photo" class="photos">
<input type="file" id="file" accept="image\">
<label class="pro" for="file">
    Choose picture
</label>

</div>
    
  

</body>
</html>