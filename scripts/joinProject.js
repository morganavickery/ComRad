$(document).ready(function(){
    $("#submit_join_project").click(function(){
        var name=$("#join_pname").val();
        var code= $("#join_pwd").val();
     

        var dataString='project_name='+name+'&project_password='+code;
        console.log(dataString);
       
        // ajax call to post to joinProject.php
        $.ajax({
            type:"POST",
            url:"./includes/joinProject.php",
            data: dataString,
            cache:false,
            success: function(result){    
                // alert(result);
                if(result=="success"){
                    // clearInput();
                    alert("You have successfully joined a project!");
                    $("#joinProjectForm :input").each(function(){
                        $(this).val('');
                    });
                }else if(result=="DNE"){
                    alert("This project does not currently exist.");
                }else if(result=="empty"){
                    alert("One or more of the fields is empty.");
                }else if(result=="invalid"){
                    alert("The project code you have entered is incorrect.");
                }else if (result=="alreadyMember"){
                    alert("You are already a member of this project.");
                }

              
            }
        });
    
        return false;
    });
});



