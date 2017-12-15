<?php
session_start();

include 'dbconnect.php';


$uid=$_SESSION['user_id'];


$sql = "SELECT M.meetup_id, M.date, P.project_name, M.location
FROM Meetup M, Project P, Memberships Me, Users U
WHERE U.user_id=$uid and U.user_id=Me.user_id and Me.project_id = M.project_id and P.project_id=M.project_id order by M.date ASC";


$result = mysqli_query($conn, $sql);
$rows=mysqli_num_rows($result);

//echo "the number of rows is".$rows;

$cnt = 0;
$r;
$row;

while ($r = mysqli_fetch_assoc($result)) {
    $row[$cnt] = $r;

    //echo $row[$cnt];
    $cnt++;

}

//echo $cnt;


$json = json_encode($row);
echo $json;

?>