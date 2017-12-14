function cpUp(){
   document.getElementById("createProjectForm").style.display = "none"; 
}

function cpDown(){
   document.getElementById("createProjectForm").style.display = "block"; 
}

function jpUp(){
   document.getElementById("joinProjectForm").style.display = "none"; 
}

function jpDown(){
   document.getElementById("joinProjectForm").style.display = "block"; 
}

function ctUp(){
   document.getElementById("createTaskForm").style.display = "none"; 
}

function ctDown(){
   document.getElementById("createTaskForm").style.display = "block"; 
}


// $(document).ready(function () {
//     $('[data-toggle="popover"]').popover({
//         placement: 'top',
//         trigger: 'hover'
//     });
// });



function displayProjects() {
    var projectsName;
    var projectsText;

    $.ajax({
        url: 'includes/getProjects.php',
        data: "",
        dataType: "json",

    }).done(function (json) {
        jsonlength = json.length;
        for (var i = 0; i < jsonlength; i++) {
            console.log(json[i].project_name);
            projectsName = json[i].project_name;
            var btn = document.createElement("BUTTON"); // Create a <button> element
            var t = document.createTextNode(projectsName); // Create a text node
            btn.setAttribute("class", "projectButton")
            btn.appendChild(t); // Append the text to <button>
            $("#projectDisplay").append(btn);

        }


    });

};




displayProjects();


