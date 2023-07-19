<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of users</title>
    <link rel="stylesheet" href="{{asset('css of fyp/listofusers.css')}}" />
    <link rel="shorcut icon" href="logo.png">
</head>
<body>
    <nav>
        <div class="navigation>">
            
        </div>
        
            <ul>
            <li><a href="C:\Users\User\FYP\Home page\homepage.html">Home</a></li> 
                <li><a href="#">Futsals</a></li> 
                <li><a href="#">Users</a></li> 
               </ul>
       <img src="logo.png" alt"" class="logo">
    </nav>
    <div class="box">
        <div class="header">
           
            <h1>List of User</h1>
            
            <button class="createUser" onclick="window.location.href='./create.html';">Create User</button>
            
        </div>
        <hr>
        <div class="body">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date of birth</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Location</th>
                        <th>Phone</th>
            
                    </tr>
            
                </thead>
            
                <tbody id="List">
            
                </tbody>
            </table>
        </div>
    </div>



<script src="listOfUser.js"></script>
</body>
</html>