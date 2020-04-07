<?php
include('config.php');
include('session.php');

$idNum = $_GET['id'];

$query = mysqli_query($conn,"SELECT id, pollname FROM polls WHERE id = " . $idNum);
$row = mysqli_fetch_array($query) or die(mysql_error());
$selectedPoll = $row['pollname'];
?>
<html>
<head>
<title><?php echo $selectedPoll?></title>
<?php include('cssfiles.php'); ?>
</head>
<body>
<?php include('nav.php');?>
<div class="container-fluid">
<div class="page-title"><h1><?php echo $selectedPoll ?></h1></div>
<form action="showresults.php" id="pollForm" name="pollForm" method="POST">
<?php 
$result = mysqli_query($conn,'SELECT optionname FROM polloptions WHERE pollname = "' . $selectedPoll . '"');
echo '<div class="form-group">';
while($row = mysqli_fetch_array($result))
{
echo "<label class='poll-option'>";
echo '<input type="radio" name="choice" id="choice" value="' . $row['optionname'] . '">';
echo $row['optionname'];
echo "</label><br>";
}
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
echo '</div>';
?>
<input type="hidden" name="id" value="<?php echo $idNum?>" />
		<input type="hidden" name="pollname" value="<?php echo $selectedPoll ?>" />
		<input type="submit" class="btn btn-info" name="submit" id="submit" value="Vote" />
		
	</form>
<?php include('jsfiles.php');?>
</body>
</html>