<?php
session_start();

include 'dbconnect.php';

// make php to submit 


$uid=$_SESSION['user_id'];

$sql="SELECT T.task_description, T.due_date, P.project_name  
FROM Users U, Task T, Project P
WHERE U.user_id= $uid AND U.user_id=T.user_id AND T.project_id=P.project_id";


$result = mysqli_query($conn, $sql);
$rows=mysqli_num_rows($result);

// echo "numrows is". $rows;


$cnt = 0;
$row;
$r;

while ($r = mysqli_fetch_assoc($result)) {
    $row[$cnt] = $r;
    $cnt++;

}

// // echo $cnt;
$json = json_encode($row);
echo $json;



//$row = mysqli_free_result($result); ////mysqli_fetch_row($result); //echo json_encode($row);
?>
