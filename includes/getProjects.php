<?php
session_start();

include 'dbconnect.php';



$uid=$_SESSION['user_id'];

$sql="SELECT P.project_name, P.project_description, P.project_id FROM Users U, Memberships M, Project P WHERE U.user_id= $uid and U.user_id=M.user_id and M.project_id=P.project_id";


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
