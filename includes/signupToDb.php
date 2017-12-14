<?php
/**
 * php return keys:
 * empty -->empty field
 * invalid -->invalid first or last name
 * email --> invalid email
 * user_taken--> username is takne
 * success -->signup was a success and user info inputted into db
 */



// if(isset($_POST['submit'])){

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
       echo "empty";
    }else{
        //check if input characters are valid
        if(!preg_match("/^[a-zA-Z]*$/",$first)||!preg_match("/^[a-zA-Z]*$/",$last)){
            echo "invalid";
        }else{
            //check if email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "email";
            }else{
                //now check if existing users with that uid
                $sql="SELECT * FROM Users WHERE username='$uid'";
                $result=mysqli_query($conn,$sql);
                $resultCheck=mysqli_num_rows($result);
                if($resultCheck>0){
                    echo "user_taken";
                }else{
                    //now that we have all the checks we need to hash the password
                    //hashing the pwd

                    $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);
                    //now we can insert the user into the database

                    $sql="INSERT INTO `Users`(`first_name`, `last_name`, `email`, `username`, `password`) VALUES ('$first', '$last','$email','$uid','$hashedPwd');";
                    //insert into database
                    mysqli_query($conn, $sql);
                    echo "success";
                 
                    

                }

            }
        }
    }


