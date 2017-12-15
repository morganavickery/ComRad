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


function displayProjects() {
    var projectsName;


    $.ajax({
        url: './includes/getProjects.php',
        data: "",
        dataType: "json",

    }).done(function (json) {
        // jsonlength = json.length;
        json.forEach(function (c) {


            //print tests
            console.log(c.project_name);
            console.log(c.project_id);
            console.log(c.project_password);

            
            projectsName = c.project_name;
            projectPass ="Join Code:"+ c.project_password;

            var btn = document.createElement("BUTTON"); // Create a <button> element
            var t = document.createTextNode(projectsName); // Create a text node
            btn.setAttribute("class", "projectButton")

            var projectID = c.project_id;

            btn.onclick = function () {
                

                id = c.project_id;
                console.log(id);
                displayProjectTasks(id);
                displayMembersofProjects(id);
                // $("#current_project").innerHTML("Project Name: "+projectName);
                // $("#project_password").innerHTML(projectPass);

            }

            btn.appendChild(t); // Append the text to <button>
            $("#projectDisplay").append(btn);

        })


    });

};


function displayProjectTasks(pid) {
    console.log("were in business: pid:"+pid);

    var id = 'project_id=' + pid;

    console.log(id);


    $.ajax({
        url: './includes/cptasks.php',
        type: "POST",
        data: id,
        cache: false,

    }).done(function (json2) {
        console.log(json2);

        $("#displaySelectedProjectTasks").empty();

        var row1= document.createElement("tr");
        var th_pname=document.createElement('th');
        var th_date= document.createElement('th');
        var th_task= document.createElement('th');

        th_pname.innerHTML="Member";
        th_date.innerHTML="Due Date";
        th_task.innerHTML="Task";
        
        row1.appendChild(th_date);
        row1.appendChild(th_pname);
        row1.appendChild(th_task);
        $("#displaySelectedProjectTasks").append(row1);

        json2 = JSON.parse(json2);
        console.log(json2);
        jsonlength2 = json2.length;
        console.log("json length is= " + json2.length);
        //T.due_date, T.task_description, U.first_name, U.last_name
        console.log(json2[0]);
        for (var i = 0; i < jsonlength2; i++) {
            console.log(json2[i].due_date);
            console.log(json2[i].task_description);
            console.log(json2[i].first_name);
            console.log(json2[i].last_name);

            var task = json2[i].task_description;
            var date = json2[i].due_date;
            var name = json2[i].first_name + " " + json2[i].last_name;

            var row = document.createElement("tr");
            var td_task = document.createElement('td');
            var td_date = document.createElement('td');
            var td_name = document.createElement('td');

            td_task.innerHTML = task;
            td_date.innerHTML = date;
            td_name.innerHTML = name;

            row.appendChild(td_date);
            row.appendChild(td_name);
            row.appendChild(td_task);

            $("#displaySelectedProjectTasks").append(row);

        }


    });

};

function displayMembersofProjects(pid) {
    console.log("were in business: displayMembers pid:"+pid);


    var ID = 'project_id=' + pid;


    $.ajax({
        url: './includes/getMembersInProjects.php',
        type: "POST",
        data: ID,
        cache: false,

    }).done(function (json3) {

        $("#displayContacts").empty();
        $("#members").empty();

        var row1= document.createElement("tr");
        var th_name=document.createElement('th');
        var th_email= document.createElement('th');
        var th_user=document.createElement("th");

        th_name.innerHTML="Member";
        th_email.innerHTML="Email";
        th_user.innerHTML="Username";
       
        
        row1.appendChild(th_name);
        row1.appendChild(th_user);
        row1.appendChild(th_email);
        
        
        $("#displayContacts").append(row1);
        
        json3 = JSON.parse(json3);
        console.log(json3);
        jsonlength3 = json3.length;
        console.log("json length is= " + json3.length);
        //T.due_date, T.task_description, U.first_name, 
        for (var i = 0; i < jsonlength3; i++) {
            console.log(json3[i].first_name);
            console.log(json3[i].last_name);
            console.log(json3[i].email);


            var email = json3[i].email;
            var name = json3[i].first_name + " " + json3[i].last_name;
            var username=json3[i].username;

            console.log(username);

            var row = document.createElement("tr");
            var td_name = document.createElement('td');
            var td_email = document.createElement('td');
            var td_user= document.createElement('td');

            td_name.innerHTML = name;
            td_email.innerHTML = email;
            td_user.innerHTML=username;


            row.appendChild(td_name);
            row.appendChild(td_user);
            row.appendChild(td_email);


            $("#displayContacts").append(row);


            // below will get users usernames and append them onto the select list

            // var option= document.createElement("option");
            // option.innerHTML(username);
            console.log(username);
            $("#members").append(
                $('<option></option>').val(username).html(username)
            );
        }


    });

};




displayProjects();



// Sarahs display projects

// function displayProjects() {

//     $("#projectDisplay").empty();
//     var projectsName;
//     var projectsText;

//     $.ajax({
//         url: 'includes/getProjects.php',
//         data: "",
//         dataType: "json",

//     }).done(function (json) {
//         jsonlength = json.length;
//         for (var i = 0; i < jsonlength; i++) {
//             console.log(json[i].project_name);
//             projectsName = json[i].project_name;
//             var btn = document.createElement("BUTTON"); // Create a <button> element
//             var t = document.createTextNode(projectsName); // Create a text node
//             btn.setAttribute("class", "projectButton")
//             btn.appendChild(t); // Append the text to <button>
//             $("#projectDisplay").append(btn);

//         }


//     });

// };




// displayProjects();


