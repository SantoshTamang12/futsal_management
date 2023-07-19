@extends('layouts.headers')
<link rel="stylesheet" href="{{asset('css of fyp/my booking page.css')}}" />
<title>my bookings</title>
@section('content')
<h1 class="writing">Your bookings</h1>
<h2 class="list1">Venue</h2>      
<h3 class="list2">Time</h3> 
<a href="profile1"><div class="box1">
    <img src="{{ asset('images/socc.jpg') }}" class="pp1">
    <p class="name1">Baglamukhi futsal</p>
    <p class="address1">Lalitpur</p>
    <p class="date1">December 7th</p>
    <p class="time1">At 7:00pm</p>
</div>
</a>
<a href="profile2">
    <div class="box2">
    <img src="{{ asset('images/socc.jpg') }}" class="pp2">
    <p class="name2">Baglamukhi futsal</p>
    <p class="address2">Lalitpur</p>
    <p class="date2">December 7th</p>
    <p class="time2">At 7:00pm</p>
</div></a>
<a href="profile3">
<div class="box3">
        <img src="{{ asset('images/socc.jpg') }}" class="pp3">
        <p class="name3">Baglamukhi futsal</p>
        <p class="address3">Lalitpur</p>
        <p class="date3">December 7th</p>
        <p class="time3">At 7:00pm</p>
</div>
</a>
<a href="fd">
<div class="box4">
    <img src="{{ asset('images/socc.jpg') }}" class="pp4">
    <p class="name4">Baglamukhi futsal</p>
    <p class="address4">Lalitpur</p>
    <p class="date4">December 7th</p>
    <p class="time4">At 7:00pm</p>
    </div>
</a>

@endsection