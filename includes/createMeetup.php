<?php
session_start();

include_once "dbconnect.php";

$uid= $_SESSION['user_id'];

$date=mysqli_real_escape_string($conn, $_POST['meetup_date']);
$loc=mysqli_real_escape_string($conn, $_POST['meetup_location']);
$proj=mysqli_real_escape_string($conn, $_POST['meetup_project']);

if(empty($date)||empty($loc)||empty($proj)){
    //this will tell us the error and we can use it later
    echo "empty";
    
}else{

    $sql="SELECT P.project_id from Project P WHERE P.project_name= '$proj'";

    $result=mysqli_query($conn,$sql);

    $pid= mysqli_fetch_assoc($result)['project_id'];
    // echo "project id is ".$pid;
    // echo $date;
    $sql="INSERT INTO `Meetup`(`project_id`, `location`, `date`) VALUES ($pid,'$loc','$date')";
    // echo $sql;
    mysqli_query($conn, $sql);

    echo "success";

}
?>