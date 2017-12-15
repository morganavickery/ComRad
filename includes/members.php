<?php
session_start();

include 'dbconnect.php';


$pid= $_SESSION['pid'];

$sql=
"SELECT U.username 
FROM Users U, Memberships M, Project P
WHERE U.user_id=M.user_id AND M.project_id=$pid";

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

// echo "test";

//echo "test";

?>

