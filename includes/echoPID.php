<?php  

    session_start();

    if(isset($_SESSION['pid'])){
        echo $_SESSION['pid'];
    }else{
        echo "select_project";
    }

    

   

?>