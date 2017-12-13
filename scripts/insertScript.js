$(document).ready(function(){
    $("#signup_submit").click(function(){
        var first=$("#signup_first").val();
        var last= $("#signup_last").val();
        var email=$("#signup_email").val();
        var uid=$("#signup_uid").val();
        var pwd=$("#signup_pwd").val();

        var dataString='first='+first+'&last='+last +'&email='+email+'&uid='+uid+'&pwd='+pwd;


        /**
 * php return keys:
 * empty -->empty field
 * invalid -->invalid first or last name
 * email --> invalid email
 * user_taken--> username is takne
 * success -->signup was a success and user info inputted into db
 */
        
       
        $.ajax({
            type:"POST",
            url:"./includes/signupToDb.php",
            data: dataString,
            cache:false,
            success: function(result){
                if(result=="success"){
                    
                    clearInput();
                    $("#signup_status").text("You have successfully signed up!");
                }else if(result=="invalid"){
                    $("#signup_status").text("The text in your first or last name is invalid.");
                }else if(result=="email"){
                    $("#signup_status").text("The email you have entered is not valid.");
                }else if(result=="user_taken"){
                    $("#signup_status").text("The username you have entered has already been taken.");
                }else if(result=="empty"){
                    $("#signup_status").text("One or more of the fields are empty");
                }

              
            }
        });
    

        return false;
    });
});


function clearInput(){
    $("#signup-form :input").each(function(){
        $(this).val('');
    });
}
