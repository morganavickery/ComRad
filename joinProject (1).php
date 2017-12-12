<?php
session_start();
// first check to see if submit is selected

if(isset($_POST['submit'])){

    include_once "dbconnect.php";
    // make sure to turn to text

    $uid= $_SESSION['user_id'];
    

    $pname=mysqli_real_escape_string($conn, $_POST['project_name']);
    $pword=mysqli_real_escape_string($conn, $_POST['project_password']);

   
    // next need some error handlers
    // check to see if all fields are filled

    //check for empty fields

    if(empty($pname)||empty($pword)){
       //this will tell us the error and we can use it later
        header("Location: ../home.php?project=empty");
        exit();
    }else{
        
    
        //now check if existing users with that uid
        $sql="SELECT * FROM Project WHERE project_name='$pname'";
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck<1){
            header("Location: ../home.php?project=projectDNE");
            exit();
        }else{
          if($row=mysqli_fetch_assoc($result)){
                //de hashing password
                $hashedPwdCheck=password_verify($pword, $row['project_password']);
                if($hashedPwdCheck==false){
                  header("Location:  ../home.php?projectjoin=error");
                  exit();
                }else if($hashedPwdCheck==true){
                   //retreive project from database and get the project id
                    $sql="SELECT * FROM Project WHERE project_name='$pname'";
                    $result=mysqli_query($conn,$sql);


                    //fetch association and get project id
                    $projectID= mysqli_fetch_assoc($result)['project_id'];

                    //enter the id and the user id into membershisp

                    //now need to check to see if membership already exists

                    $sql="SELECT * FROM Memberships M WHERE M.project_id=$projectID and M.user_id=$uid";
                    $result= mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result)>0){

                        header("Location: ../home.php?projectjoin=alreadyMember");
                        exit();
                    }else{

                        //also need to create a membership here with the user as a member of their project
                        $sql= "INSERT INTO `Memberships`(`project_id`, `user_id`) VALUES ($projectID,$uid)";

                        //insert into membership into database
                        mysqli_query($conn, $sql);
                        header("Location: ../home.php?project=success");
                        exit();

                    }

                    
                }
            }
            

        
           

        }

    }


}else{
    
    header("Location: ../home.php");
    exit();
}