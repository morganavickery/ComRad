$(document).ready(function(){
    $("#submit_project").click(function(){
        alert("clicked");
        var name=$("#project_name").val();
        var code= $("#project_pwd").val();
        var desc=$("#project_desc").val();

        

        var dataString='project_name='+name+'&project_password='+code+'&project_description='+desc;
        console.log(dataString);
        /**
 * php return keys:
 * empty -->empty field
 * invalid -->invalid first or last name
 * email --> invalid email
 * user_taken--> username is takne
 * success -->signup was a success and user info inputted into db
 */
        // fix below to relate
    //    below link to createProject.php
        $.ajax({
            type:"POST",
            url:"./includes/createProject.php",
            data: dataString,
            cache:false,
            success: function(result){    
                if(result=="success"){
                    // alert that you have created a project
                    alert("You have successfully created a project");
                    // clear all the fields
                    $("#createProjectForm :input").each(function(){
                        $(this).val('');
                    });
                }else if(result=="nametaken"){
                    alert("The name of this project has already been taken");
                }else if(result=="empty"){
                     alert("One or more of the fields is empty.");
                }

                displayProjects();
            }
        });
    
        return false;
    });
});


