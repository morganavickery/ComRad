
    <div class="navigationContainer">
        <a class='navButton'id="homeNav" onclick="homeClick()"></a>
        <a class='navButton' id="overNav" onclick="overview()">Overview</a>
        <a class='navButton' id="deleNav" onclick="delegation()">Delegation</a>
        <h3>Ben Corvera<br>Sarah Ganci<br>Morgan Vickery</h3>
    </div>

    <?php 
        include_once "header.php";
    ?>

    <?php
        if(isset($_SESSION['username'])){
            echo "<h1 id='title'> Welcome to ComRad, ".$_SESSION['first_name']."!</h1>";
        }
     ?>

    <h2 id='subtitle'>Delegate tasks and keep your group members accountable!</h2>

<?php 
    if(isset($_SESSION['username'])){
        echo '';
    } else {
        echo '';
    }
?>

    <div class="widgetBoard">
        <!--ALL PROJECTS WIDGET-->
        <div class="widget" id="allProjectsWidget">
            <h2>My Projects</h3>
            <div class="widgetHeader">
                <button class="dropdown" id="createProjectDrop">
                <form id="createProject" action="includes/createProject.php" method="POST"> 
                        Project Name: <input type="text" name="project_name" placeholder="project name"><br/>
                        Project Password: <input type="text" name="project_password" placeholder="project password"><br/>
                        Project Description: <input type="text" name="project_description" placeholder="description"><br/>
                        <button type="submit" name="submit">Create Project</button><br/>           
                </form>
                <button class="dropdown" id="joinProjectDrop">
                <form id ="joinProject" action="includes/joinProject.php" method="POST"> 
                        Project Name: <input type="text" name="project_name" placeholder="project name"> <br/>
                        Project Password: <input type="text" name="project_password" placeholder="project password"><br/>
                        <button type="submit" name="submit">Join Project</button><br/>           
                </form>
            </div>
            <table><tr><td>PROJECT 1</td></tr><tr><td>PROJECT 2</td></tr></table>
            <!--LIST OF ALL PROJECTS HERE-->
        </div>

        <!--ALL TASKS WIDGET-->
        <div class="widget" id="allTasksWidget">
            <div class="widgetHeader"></div>
            <table><tr><td>TASK 1</td></tr><tr><td>TASK 2</td></tr></table>
            <!--LIST OF ALL MY TASKS HERE-->
        </div>

        <div class="widget" id="currentProjectWidget">
        <h2>Current Project</h2>
            <!--CURRENT TASKS WIDGET-->
            <div class="widget" id="cpTasks">
                <h3>Tasks</h3>
                <div class="widgetHeader">
                    <form class="dropdown" id="createTask">
                        <!--FORM TO CREATE NEW TASK HERE-->
                    </form>
                </div>
                <!--LIST OF CURRENT PROJECT TASKS HERE-->
            </div>
            <!--CONTACTS WIDGET-->
            <div class="widget" id="contacts">
                <h3>Contacts</h3>
            </div>
        </div>
    </div>


<?php
    include_once "footer.php";

?>


