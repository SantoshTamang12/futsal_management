<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new user</title>
    <link rel="stylesheet" href="{{asset('css of fyp/createuser.css')}}" />
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
       <img src="logo.png" alt="" class="logo">
    </nav>
<div class="box">
    <form method="POST" action="process-form.php">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        
        <label for="dateofbirth">Date of Birth:</label>
        <input type="date" name="dateofbirth" id="dateofbirth" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        
        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
          <option value="">Select Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
        
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" required>
        
        <label for="phone">Phone Number:</label>
        <input type="tel" name="phone" id="phone" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        
        <input type="submit" value="Create User">
      </form>
    </div>       

<script src="listOfUser.js"></script>
</body>
</html>