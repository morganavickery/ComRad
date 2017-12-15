<?php
session_start();
// first check to see if submit is selected



include_once "dbconnect.php";
// make sure to turn to text

$pid= $_SESSION['pid'];

$member=mysqli_real_escape_string($conn, $_POST['member']);
$task=mysqli_real_escape_string($conn, $_POST['task_desc']);
$date=mysqli_real_escape_string($conn, $_POST['task_date']);


// next need some error handlers
// check to see if all fields are filled

//check for empty fields

if(isset($_SESSION['pid'])){
        
    if(empty($member)||empty($date)||empty($task)){
        //this will tell us the error and we can use it later
        echo "empty";
        
    }else{

        // echo "success";
        

        $sql="SELECT U.user_id from Users U WHERE U.username= '$member'";

        $result=mysqli_query($conn,$sql);

        $uid= mysqli_fetch_assoc($result)['user_id'];
        // echo $date;
        $sql="INSERT INTO `Task`(`project_id`, `user_id`, `due_date`, `task_description`, `state`) VALUES ($pid, $uid, '$date', '$task',1)";
        mysqli_query($conn, $sql);

        echo "success";

    }

}else{
    echo "select_project";
}



