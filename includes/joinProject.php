<?php
session_start();
// first check to see if submit is selected


include_once "dbconnect.php";
// make sure to turn to text

$uid= $_SESSION['user_id'];


$pname=mysqli_real_escape_string($conn, $_POST['project_name']);
$pword=mysqli_real_escape_string($conn, $_POST['project_password']);

// echo "Project name is $pname and Password is $pword";


// next need some error handlers
// check to see if all fields are filled

//check for empty fields

if(empty($pname)||empty($pword)){ 
    echo "empty";
}else{
   
    

    //now check if existing users with that uid
    $sql="SELECT * FROM Project WHERE project_name='$pname'";
    $result=mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);
    if($resultCheck<1){
        echo "DNE";
    }else{
       
        if($row=mysqli_fetch_assoc($result)){
            // echo "in the result row";
            //de hashing password
            $realPassword= $row['project_password'];
            // echo $realPassword;
            if($realPassword==$pword){
                // echo "match";
                // //retreive project from database and get the project id
                $sql="SELECT * FROM Project WHERE project_name='$pname'";
                $result=mysqli_query($conn,$sql);
                //fetch association and get project id
                $projectID= mysqli_fetch_assoc($result)['project_id'];
                //enter the id and the user id into membershisp
                //now need to check to see if membership already exists
                $sql="SELECT * FROM Memberships M WHERE M.project_id=$projectID and M.user_id=$uid";
                $result= mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0){
                    echo "alreadyMember";
                }else{
                    //also need to create a membership here with the user as a member of their project
                    $sql= "INSERT INTO `Memberships`(`project_id`, `user_id`) VALUES ($projectID,$uid)";
                    //insert into membership into database
                    mysqli_query($conn, $sql);
                    echo "success";
                }                    
            }else{
                echo "invalid";
            }
        }
        
    }

}


