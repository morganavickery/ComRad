<?php 
    include_once "header.php";
?>
        <div class="main-wrapper">
            <h2>SIGN UP</h2>
            <form class="signup-form" action="includes/signupToDb.php" method="POST">
                <input type-"text" name="first" placeholder="First Name">
                <input type-"text" name="last" placeholder="Last Name">
                <input type-"text" name="email" placeholder="E-mail">
                <input type-"text" name="uid" placeholder="Username">
                <input type-"password" name="pwd" placeholder="Password">
                <button type="submit" name="submit" >SUBMIT</button>
            </form>
        </div>

<?php
    include_once "footer.php";

?>
