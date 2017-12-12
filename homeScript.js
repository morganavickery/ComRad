    function homeClick(){
        document.getElementById("projectsWidget").style.display = "";
        document.getElementById("tasksWidget").style.display = "";
        document.getElementById("subtitle").style.color="red";
    }
    function taskClick(){
        document.getElementById("projectsWidget").style.display = "none";
        document.getElementById("tasksWidget").style.display = "";
        document.getElementById("subtitle").style.color="blue";

    }
    function projClick(){
        document.getElementById("projectsWidget").style.display = "";
        document.getElementById("tasksWidget").style.display = "none";
        document.getElementById("subtitle").style.color="green";
    }
