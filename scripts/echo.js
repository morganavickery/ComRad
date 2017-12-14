

$(document).ready(function(){
    $.ajax({
        type:"POST",
        url:"./includes/echoUser.php",
        data: "",
        cache:false,
        success: function(result){
            
            $("#subtitle").html("Welcome, "+result);
          
        }
    });
});