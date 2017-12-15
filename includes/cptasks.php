<?php
session_start();

include 'dbconnect.php';


if(isset($_POST['project_id'])){
    // echo "posted project id of: ".$_POST['project_id'];
} else {
    // echo "not posted";
}


// $projectID = $_POST['project_id'];
$_SESSION['pid'] =$_POST['project_id'];
//echo $projectID;
$pid=$_POST['project_id'];
// echo "the pid is $pid";


$sql=
"SELECT distinct T.task_id, T.due_date, T.task_description, U.first_name, U.last_name
FROM Users U, Task T, Memberships M, Project P
WHERE T.project_id=$pid and T.user_id = U.user_id order by T.due_date ASC";

// echo "the sql is ".$sql;

$result = mysqli_query($conn, $sql);

// echo "the result is ".$result;

$cnt = 0;
$row;
$r; 

while ($r = mysqli_fetch_assoc($result)) {
    $row[$cnt] = $r;
    // echo $row[$cnt];
    $cnt++;

}
//echo $row;

// echo "the count is $cnt";

$json = json_encode($row);
echo $json;

//echo "test";

?>

