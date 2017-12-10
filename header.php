<?php
//must have session start to be logged in
session_start();

?>

<!DOCTYPE html>


<html>

<head>  
    <title>ComRad</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <nav>
            <div id="logInOutContainer">
                <!--<ul>
                  <li><a href="home.php">Home</a></li>
                </ul>-->
                <div class="nav-login">
                    <?php 
                        if(isset($_SESSION['username'])){
                            echo '<form action="includes/logout.php" class="loginButton" id="login-button" method="POST">
                            <button type="submit" name="submit">Logout</button>
                            </form>';
                        }else{
                            echo '<form action="includes/login.php" class="loginButton" id="login-button" method="POST"> 
                            <input type="text" name="uid" placeholder="Username">
                            <input type="text" name="pwd" placeholder="password">
                            <button type="submit" name="submit">Login</button>                  
                               </form>';
                            echo '<a href="signup.php" class="loginButton">Sign up</a>';
                        }
                    ?>
                    
                <!-- action links to php file to run method tells us we need to POST which is where the variables in the php are read from -->
                  
                </div>
            </div>

        </nav>
    </header>