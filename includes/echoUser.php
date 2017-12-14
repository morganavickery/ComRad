<?php  

    session_start();

    $f=$_SESSION['first_name'];
    $l= $_SESSION['last_name'];

    echo "$f $l";

?>