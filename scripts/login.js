$(document).ready(function(){
    $("#submit_login").click(function(){
        var name=$("#login_uid").val();
        var code= $("#login_pwd").val();
     

        var dataString='uid='+name+'&pwd='+code;
        // console.log(dataString);
       
        // ajax call to post to joinProject.php
        $.ajax({
            type:"POST",
            url:"./includes/login.php",
            data: dataString,
            cache:false,
            success: function(result){    
                // alert(result);
                if(result=="success"){
                    window.location.replace("home.html");
                }else if(result=="error"){
                    alert("Your username or password is incorrect.");
                }else if(result=="empty"){
                    alert("One or more of the fields is empty.");
                }

              
            }
        });
    
        return false;
    });
});



