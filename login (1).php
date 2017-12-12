<?php
session_start();
if(isset($_POST['submit'])){

    include 'dbconnect.php';
    $uid=mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd=mysqli_real_escape_string($conn, $_POST['pwd']);
    

    //error handlers

    //check for empty inputs

    if(empty($uid)||empty($pwd)){
        header("Location:  ../index.php?login=empty");
        exit();
    }else{
      $sql="SELECT * FROM Users WHERE username='$uid'";
      $result=mysqli_query($conn,$sql);
      $resultCheck=mysqli_num_rows($result);
      if($resultCheck<1){
        header("Location:  ../index.php?login=error");
        exit();
      }else{
          if($row=mysqli_fetch_assoc($result)){
              //de hashing password
              $hashedPwdCheck=password_verify($pwd, $row['password']);
              if($hashedPwdCheck==false){
                header("Location:  ../index.php?login=error");
                exit();
              }else if($hashedPwdCheck==true){
                  //log in the user here using session variable that we can use in all pages using session
                  $_SESSION['user_id']=$row['user_id'];
                  $_SESSION['first_name']=$row['first_name'];
                  $_SESSION['last_name']=$row['last_name'];
                  $_SESSION['email']=$row['email'];
                  $_SESSION['username']=$row['username'];

                  header("Location:  ../home.php?login=success");
                  exit();
              }
          }
      }
    }
}else{
    header("Location:  ../index.php?login=error");
    exit();
}