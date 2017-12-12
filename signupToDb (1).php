<?php
// first check to see if submit is selected

if(isset($_POST['submit'])){

    include_once "dbconnect.php";
    // make sure to turn to text

    $first=mysqli_real_escape_string($conn, $_POST['first']);
    $last=mysqli_real_escape_string($conn, $_POST['last']);
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $uid=mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd=mysqli_real_escape_string($conn, $_POST['pwd']);
   
    // next need some error handlers
    // check to see if all fields are filled

    //check for empty fields

    if(empty($first)||empty($last)||empty($email)||empty($uid)||empty($pwd)){
       //this will tell us the error and we can use it later
        header("Location: ../signup.php?signup=empty");
        exit();
    }else{
        //check if input characters are valid
        if(!preg_match("/^[a-zA-Z]*$/",$first)||!preg_match("/^[a-zA-Z]*$/",$last)){
            header("Location: ../signup.php?signup=invalid");
            exit();
        }else{
            //check if email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../signup.php?signup=email");
                exit();
            }else{
                //now check if existing users with that uid
                $sql="SELECT * FROM Users WHERE username='$uid'";
                $result=mysqli_query($conn,$sql);
                $resultCheck=mysqli_num_rows($result);
                if($resultCheck>0){
                    header("Location: ../signup.php?signup=usertaken");
                    exit();
                }else{
                    //now that we have all the checks we need to hash the password
                    //hashing the pwd

                    $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);
                    //now we can insert the user into the database

                    $sql="INSERT INTO `Users`(`first_name`, `last_name`, `email`, `username`, `password`) VALUES ('$first', '$last','$email','$uid','$hashedPwd');";
                    //insert into database
                    mysqli_query($conn, $sql);
                    header("Location: ../signup.php?signup=success");
                    exit();

                }

            }
        }
    }


}else{
    // if submit not actually selected send back to signup page
    header("Location: ../signup.php");
    exit();
}