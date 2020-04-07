<?php
include('config.php');
include('session.php');
$idNum = $_GET['id'];

$result = mysqli_query($conn,'SELECT pollname FROM polls WHERE id = "' . $idNum . '"');

while($row = mysqli_fetch_array($result))
{
	$pollname = $row['pollname'];
}
$sql = mysqli_query($conn,'SELECT optionname, total FROM polloptions WHERE pollname = "' . $pollname . '"');
$results = array();
while($row = mysqli_fetch_assoc($sql))
{
	$results[] = $row;
}
if (!$sql) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
echo json_encode($results);
//echo json_encode($data);
?>