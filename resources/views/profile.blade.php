<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{asset('css of fyp/profile.css')}}" />
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
       <img src="{{ asset('images/logo.png') }}" alt"" class="logo">
    </nav>
    <h1 class="name">Baglamukhi Futsal</h1>
    <img src="{{ asset('images/socc.jpg') }}" alt="" class="profileimage">
    <div class="infobox">
        <p class="boxfiwri">Futsal pitches</p>
       </div>
    <table class="infor" border="1">
        <tr>
            <th class="infopit">Facility Information</th>
        </tr>
        <tr>
            <td>
                <p > 5 a side <br>
                    7 a side<br>
                    Facility
                </p>
            </td>
        </tr>
    </table>
    <table class="informa" border="1">
        <tr>
            <th class="geneinfo">General information</th>
        </tr>
        <tr>
            <td>
                <p> Address <br>
                    Baglamukhi<br>
                    Phone Number<br>

                    980801535
                </p>
            </td>
        </tr>
    </table>
    <table class="cash" border="1">
        <tr>
            <th class="geneinfo">Prices</th>
        </tr>
        <tr>
            <td>
                <p> Weekday<br>
                    1000<br>
                    Weekend<br>
                    1500
                </p>
            </td>
        </tr>
    </table>
    <h1 class="loca">Location</h1>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14132.859528754618!2d85.31811093079162!3d27.679752724851813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1932adf0481b%3A0x146c36a6860f950e!2sMaa%20Baglamukhi%20Futsal!5e0!3m2!1sen!2snp!4v1675966140987!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
   <a href="C:\Users\User\FYP\Message\message.html">
    <button class="but">Direct Text</button></a> 
 <h1 class="bookon">Book Online</h1>    
 <h2  class="available">Available </h2>
 <h2 class="booked">Booked</h2>
 <div class="avaicolo"></div>
 <div class="bookcolo"></div>
<div class="bookInfo">
<div class="sun">
<h1>Sunday</h1>
<div class="rowsu">
    <button class="seat" onclick="openConpo()"></button>
    <button class="seat" onclick="openConpo()" ></button>
    <button class="seat" onclick="openConpo()"></button>
    <button class="seat" onclick="openConpo()"></button>
    <button class="seat" onclick="openConpo()"></button>
    <button class="seat" onclick="openConpo()"></button>
    <button class="seat-booked"></button>
    <button class="seat" onclick="openConpo()"></button>
    <button class="seat" onclick="openConpo()"></button>
    <button class="seat" onclick="openConpo()"></button>
    <button class="seat" onclick="openConpo()"></button>
    <button class="seat booked"></button> 
</div>
</div>
<div class="mon">
<h1>Monday</h1>
<div class="rowmo">
    <button type="submit" class="seatm" onclick="openConpo()"></button>
    <button type="submit" class="seatm" onclick="openConpo()"></button>
    <button type="submit" class="seatm" onclick="openConpo()"></button>
    <button type="submit" class="seatm" onclick="openConpo()"></button>
    <button type="submit" class="seatm" onclick="openConpo()"></button>
    <button type="submit" class="seatm" onclick="openConpo()"></button>
    <button type="submit" class="seatm-booked"></button>
    <button type="submit" class="seatm" onclick="openConpo()"></button>
    <button type="submit" class="seatm" onclick="openConpo()"></button>
    <button type="submit" class="seatm" onclick="openConpo()"></button>
    <button type="submit" class="seatm" onclick="openConpo()"></button>
    <button type="submit" class="seatm-booked"></button> 
</div>
</div>
<div class="tue">
<h1>Tuesday</h1>
<div class="rowtu">
    <button type="submit" class="seatu" onclick="openConpo()"></button>
    <button type="submit" class="seatu" onclick="openConpo()"></button>
    <button type="submit" class="seatu" onclick="openConpo()"></button>
    <button type="submit" class="seatu" onclick="openConpo()"></button>
    <button type="submit" class="seatu" onclick="openConpo()"></button>
    <button type="submit" class="seatu" onclick="openConpo()"></button>
    <button type="submit" class="seatu-booked"></button>
    <button type="submit" class="seatu" onclick="openConpo()"></button>
    <button type="submit" class="seatu" onclick="openConpo()"></button>
    <button type="submit" class="seatu" onclick="openConpo()"></button>
    <button type="submit" class="seatu" onclick="openConpo()"></button>
    <button type="submit" class="seatu-booked"></button> 
</div>
</div>
<div class="wed">
<h1>Wednesday</h1>
<div class="rowe">
    <button type="submit" class="seatw" onclick="openConpo()"></button>
    <button type="submit" class="seatw" onclick="openConpo()"></button>
    <button type="submit" class="seatw" onclick="openConpo()"></button>
    <button type="submit" class="seatw" onclick="openConpo()"></button>
    <button type="submit" class="seatw" onclick="openConpo()"></button>
    <button type="submit" class="seatw" onclick="openConpo()"></button>
    <button type="submit" class="seatw-booked"></button>
    <button type="submit" class="seatw" onclick="openConpo()"></button>
    <button type="submit" class="seatw" onclick="openConpo()"></button>
    <button type="submit" class="seatw" onclick="openConpo()"></button>
    <button type="submit" class="seatw" onclick="openConpo()"></button>
    <button type="submit" class="seatw-booked"></button> 
</div>
</div>
<div class="thu">
<h1>Thursday</h1>
<div class="rowth">
    <button type="submit" class="seath" onclick="openConpo()"></button>
    <button type="submit" class="seath" onclick="openConpo()"></button>
    <button type="submit" class="seath" onclick="openConpo()"></button>
    <button type="submit" class="seath" onclick="openConpo()"></button>
    <button type="submit" class="seath" onclick="openConpo()"></button>
    <button type="submit" class="seath" onclick="openConpo()"></button>
    <button type="submit" class="seath booked"></button>
    <button type="submit" class="seath" onclick="openConpo()"></button>
    <button type="submit" class="seath" onclick="openConpo()"></button>
    <button type="submit" class="seath" onclick="openConpo()"></button>
    <button type="submit" class="seath" onclick="openConpo()"></button>
    <button type="submit" class="seath-booked"></button> 
</div>
</div>
<div class="fri">
<h1>Friday</h1>
<div class="rowf">
    <button type="submit" class="seatf" onclick="openConpo()"></button>
    <button type="submit" class="seatf" onclick="openConpo()"></button>
    <button type="submit" class="seatf" onclick="openConpo()"></button>
    <button type="submit" class="seatf" onclick="openConpo()"></button>
    <button type="submit" class="seatf" onclick="openConpo()"></button>
    <button type="submit" class="seatf-booked"></button>
    <button type="submit" class="seatf" onclick="openConpo()"></button>
    <button type="submit" class="seatf" onclick="openConpo()"></button>
    <button type="submit" class="seatf" onclick="openConpo()"></button>
    <button type="submit" class="seatf" onclick="openConpo()"></button>
    <button type="submit" class="seatf" onclick="openConpo()"></button>
    <button type="submit" class="seatf booked"></button> 
</div>
</div>
<div class="sat">
<h1>Saturday</h1>
<div class="rowsa">
    <button type="submit" class="seatsa" onclick="openConpo()"></button>
    <button type="submit" class="seatsa" onclick="openConpo()"></button>
    <button type="submit" class="seatsa" onclick="openConpo()"></button>
    <button type="submit" class="seatsa" onclick="openConpo()"></button>
    <button type="submit" class="seatsa" onclick="openConpo()"></button>
    <button type="submit" class="seatsa" onclick="openConpo()"></button>
    <button type="submit" class="seatsa-booked"></button>
    <button type="submit" class="seatsa" onclick="openConpo()"></button>
    <button type="submit" class="seatsa" onclick="openConpo()"></button>
    <button type="submit" class="seatsa" onclick="openConpo()"></button>
    <button type="submit" class="seatsa" onclick="openConpo()"></button>
    <button type="submit" class="seatsa-booked"></button> 
</div>
</div>
    
               

</div>
<div class="conpopup" id="coPop">
    <button type="button" class="clobut" onclick="closeConpo"><img src="{{ asset('images/close.png') }}"></button>
<h1>Booking confirmmation</h1>
<div class="amobox">
<div class="amo">
<div>
 <p>Amount</p>   
</div>
</div>
</div>
<div class="datbox">
    <div class="dat">
    <div>
     <p>date and time</p>   
    </div>
    </div>
    </div>
<button type="button" class="paym" onclick="payPop()">Pay</button>
</div>
<div class="paypop" id="payPop">
<button type="button" class="clopay" onclick="closePaypo"><img src="{{ asset('images/close.png') }}"></button>
<h1> Payment confirmation</h1>

</div>
<script src="{{ asset('css of fyp/profile.js') }}"></script>
</body>
</html>