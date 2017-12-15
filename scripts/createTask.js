$(document).ready(function(){
    $("#submit_task").click(function(){
        var date=$("#task_date").val();
        var task= $("#task_desc").val();
        var member=$("#members option:selected").text();
        var dataString='task_date='+date+'&task_desc='+task+'&member='+member;
        console.log(dataString);
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
            url:"./includes/createTask.php",
            data: dataString,
            cache:false,
            success: function(result){    
                // alert(result);
                if(result=="success"){
                    // console.log("response form php");
                    // alert that you have created a project
                    alert("You have succesfully added a task!");
                    // // clear all the fields
                    $("#createTaskForm :input").each(function(){
                        $(this).val('');
                    });

                    //display current project tasks
                    displayCPTask();
                    // display all my tasks
                    displayTasks();
                }else if(result=="select_project"){
                    alert("You must select a project first.");
                }else if (result=="empty"){
                    alert("One or more of the task fields are empty.");
                }
                
            
            }
        });   
        return false;
    });
});



function displayCPTask(){

    $.ajax({
        type:"POST",
        url:"./includes/echoPID.php",
        data: "",
        cache:false,
        success: function(result){    
            console.log(result);
            // alert(result);
            if(result=="select_project"){
                
            }else {
                displayProjectTasks(result);
            }
            
        
        }
    });   


}




