<?php
session_start();
// first check to see if submit is selected



include_once "dbconnect.php";
// make sure to turn to text

$uid= $_SESSION['user_id'];

$pname=mysqli_real_escape_string($conn, $_POST['project_name']);
$pword=mysqli_real_escape_string($conn, $_POST['project_password']);
$pdesc=mysqli_real_escape_string($conn, $_POST['project_description']);


// next need some error handlers
// check to see if all fields are filled

//check for empty fields

if(empty($pname)||empty($pword)||empty($pdesc)){
    //this will tell us the error and we can use it later
    echo "empty";
    
}else{
    

    //now check if existing users with that uid
    $sql="SELECT * FROM Project WHERE project_name='$pname'";
    $result=mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);
    if($resultCheck>0){
        echo "nametaken";
    }else{
    
        //insert project into database
        $sql="INSERT INTO `Project`(`project_name`, `project_password`, `project_description`) VALUES ('$pname','$pword','$pdesc')";
        mysqli_query($conn, $sql);

    
        //retreive project from database and get the project id
        $sql="SELECT * FROM Project WHERE project_name='$pname'";
        $result=mysqli_query($conn,$sql);


        //fetch association and get project id
        $projectID= mysqli_fetch_assoc($result)['project_id'];

        //enter the id and the user id into membershisp
        //also need to create a membership here with the user as a member of their project
        $sql= "INSERT INTO `Memberships`(`project_id`, `user_id`) VALUES ($projectID,$uid)";

        //insert into membership into database
        mysqli_query($conn, $sql);
        echo "success";

    }

}


