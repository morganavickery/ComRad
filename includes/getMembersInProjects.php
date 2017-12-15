<?php
    session_start();

    
    include 'dbconnect.php';;



    $pid = $_POST['project_id'];
    $_SESSION['pid'] = $_POST['project_id'];
    //echo $projectID;


    $sql=
    "SELECT distinct U.user_id, U.first_name, U.last_name, U.email, U.username
    FROM Users U, Memberships M, Project P
    WHERE $pid = M.project_id and M.user_id = U.user_id
    order by U.first_name ASC, U.last_name ASC";


    $result = mysqli_query($conn, $sql);

    $cnt = 0;
    $row;
    $r;    

    while ($r = mysqli_fetch_assoc($result)) {
        $row[$cnt] = $r;
        // echo $row[$cnt];
        $cnt++;

    }
    //echo $row;

    $json = json_encode($row);
    echo $json;
    // echo "This is the project it: " $projectID;

?>