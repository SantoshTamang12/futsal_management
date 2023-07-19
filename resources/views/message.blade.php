<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="{{asset('css of fyp/message.css')}}" />
    <link rel="shorcut icon" href="logo.png">
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
       <img src="{{ asset('images/logo.png') }}" alt"" class="logo">
    </nav>
<div class="sidebar">
    <h1 class="headchat">Chats</h1>
    <div class="boxsear">
    <form action="get" class="searchbar">
        <input type="text" placeholder="search chat" name="q">
        <button type="submit" class="butt"><img src="{{ asset('images/search.png') }}"></button>
    </form>
    
</div>
<div class="box1">
<img src="{{ asset('images/user.png') }}">
<a href="" class="name1">Pranesh Shrestha</a>
</div>
<div class="box2">
    <img src="{{ asset('images/user.png') }}">
    <a href="" class="name2">Pranesh Shrestha</a>
</div>
<div class="box3">
    <img src="{{ asset('images/user.png') }}">
    <a href="" class="name3">Pranesh Shrestha</a>
</div>
<div class="box4">
    <img src="{{ asset('images/user.png') }}">
    <a href="" class="name4">Pranesh Shrestha</a>
</div>
<div class="box5">
    <img src="{{ asset('images/user.png') }}">
    <a href="" class="name5">Pranesh Shrestha</a>
</div>
</div>
<div class="infobar">
    <a href="C:\Users\User\FYP\profile of user\profileuser.html" class="na"><h1 class="name">Pranesh Shrestha</h1></a>
    <img src="user.png" class="userima">
</div>
<div class="msgbox">
    <div class="messages" id="messageBox" > </div>
<div class="sendmsg">
    <div class="sendmss">
        <input id="inputPlace" type="text" placeholder="send message" name="a">
        <button  class="" id="sendbox"><img src="send.png"></button>
        
</div>
</div> 
<script src="code.js"></script>  
</body>
</html>