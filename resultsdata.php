<?php
include('config.php');
include('session.php');
$selectedPoll = $_GET['pollname'];
$result = mysqli_query($conn,"SELECT optionname, total FROM polloptions WHERE pollname = " . $selectedPoll);
 for ($x = 0; $x < mysqli_num_rows($result); $x++) {
        $data[] = mysqli_fetch_assoc($query);
    }
	
	mysqli_close($conn);
?>