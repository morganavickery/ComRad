
    <div class="navigationContainer">
        <a class='navButton'id="homeNav" onclick="homeClick()">ComRad</a>
        <a class='navButton' id="taskNav" onclick="taskClick()">My Tasks</a>
        <a class='navButton' id="projNav" onclick="projClick()">My Projects</a>
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

    <div class="widgetBoard">
    <!--WIDGETS-->
        <div id="projectsWidget">
            <div class="widgetHeader">
                <form action="includes/createProject.php" method="POST"> 
                        Project Name: <input type="text" name="project_name" placeholder="project name"><br/>
                        Project Password: <input type="text" name="project_password" placeholder="project password"><br/>
                        Project Description: <input type="text" name="project_description" placeholder="description"><br/>
                        <button type="submit" name="submit">Create Project</button><br/>           
                </form>
                <form action="includes/joinProject.php" method="POST"> 
                        Project Name: <input type="text" name="project_name" placeholder="project name"> <br/>
                        Project Password: <input type="text" name="project_password" placeholder="project password"><br/>
                        <button type="submit" name="submit">Join Project</button><br/>           
                </form>
            </div>
            <table>
                <tr>
                    <td>My Projects</td>
                </tr>
            </table>
        </div>
        <div id="tasksWidget">
            <div class="widgetHeader">

            </div>
            <table>
                <tr>
                    <td>My Tasks:</td>
                </tr>
            </table>
        </div>
        <div id="currentProjectWidget">
            <div class="widgetHeader">

            </div>
            <table>
                <tr>
                    <td>Current Project</td>
                </tr>

            </table>
        </div>
        <div id="currentTaskWidget">
            <div class="widgetHeader">

            </div>
            <table>
                <tr>
                    <td>Current Task</td>
                </tr>
            </table>
        </div>

    </div>


<?php
    include_once "footer.php";

?>

<script>
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
</script>
