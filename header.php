<?php
//must have session start to be logged in
session_start();

?>

<!DOCTYPE html>


<html>

<head>  
    <title>ComRad</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="homeScript.js"></script>

</head>

<body>
    <header>
            <div class="logInOutContainer">
                    <?php 
                        if(isset($_SESSION['username'])){
                            echo '
                                <form action="includes/logout.php" class="login-form" id="logoutContainer" method="POST">
                                    <button type="submit" name="submit">Logout</button>
                                </form>
                            ';
                        }else{
                            echo 
                            '
                                <form action="includes/login.php" class="login-form" method="POST"> 
                                    <input type="text" name="uid" placeholder="Username">
                                    <input type="text" name="pwd" placeholder="Password">
                                    <button type="submit" name="submit">Login</button>                  
                                </form>
                                <a href="signup.php" id="signupBut" style="text-decoration:none">Sign Up</a>
                            ';
                        }
                    ?>
            </div>
    </header>