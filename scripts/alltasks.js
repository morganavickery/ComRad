function displayTasks() {

    $.ajax({
        url: 'includes/allTasks.php',
        data: "",
        dataType: "json",

    }).done(function (json) {
        jsonlength = json.length;
        for (var i = 0; i < jsonlength; i++) {
            console.log(json[i].project_name);

            var pname=  json[i].project_name;
            var date= json[i].due_date;
            var task= json[i].task_description; 

            var row= document.createElement("tr");
            var td_pname=document.createElement('td');
            var td_date= document.createElement('td');
            var td_task= document.createElement('td');

            td_pname.innerHTML=json[i].project_name;
            td_date.innerHTML=json[i].due_date;
            td_task.innerHTML=json[i].task_description;
            
            row.appendChild(td_date);
            row.appendChild(td_pname);
            row.appendChild(td_task);

            $("#displayAllTasks").append(row);
            // change to display task information
            // tasks = "Project: " + json[i].project_name+ " Due Date: " +json[i].due_date +"Task Description: "+json[i].task_description;
            // var btn = document.createElement("BUTTON"); // Create a <button> element
            // var t = document.createTextNode(tasks); // Create a text node
            // // tasks are task buttons
            // btn.setAttribute("class", "taskButton")
            // btn.appendChild(t); // Append the text to <button>

            // // home needs to have a task display
            // $("#displayAllTasks").append(btn);

        }


    });

};

displayTasks();
