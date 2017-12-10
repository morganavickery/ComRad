<?php
if(isset($_POST['submit'])){
    //unset all session variable
    session_start();
    session_unset();

    session_destroy();
    header("Location: ../index.php");
    exit();
}

?>