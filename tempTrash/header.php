<?php
//must have session start to be logged in
session_start();

?>

<!DOCTYPE html>


<html>

<head>  
    <title>ComRad</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="homeScript.js"></script>

</head>

<body>
    <header>
            <div class="logInOutContainer">
            <!-- trying to removie php -->
                 
            <form action="includes/logout.php" class="login-form" id="logoutContainer" method="POST">
                <button type="submit" name="submit">Logout</button>
            </form>
            <form action="includes/login.php" class="login-form" method="POST"> 
                <input type="text" name="uid" placeholder="Username">
                <input type="text" name="pwd" placeholder="Password">
                <button type="submit" name="submit">Login</button>                  
            </form>
            <a href="signup.html" id="signupBut" style="text-decoration:none">Sign Up</a>
    
                    
            </div>
    </header>

    <!-- to do on header: essentially reroute all actions to be onclicks  and eventually put all this at the top of the html file-->