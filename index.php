<?php
include('config.php');
include('session.php');

if( isset( $_GET['msg'] ) ) { 
   $successMsg = $_GET['msg'];
} 

?>
<html>
<head>
<title>Voting App</title>
<?php include('cssfiles.php'); ?>
</head>
<body>
<?php include('nav.php');?>
<div class="container-fluid">
<div class="page-title"><h1>Welcome to the Voting App</h1></div>
  <?php
  if ( isset($successMsg) )
  {
	  if( $successMsg == "success" )  { 
    echo "<div class='alert alert-success' role='alert'>Welcome!</div>";
} 
else if ($successMsg == "logout" )  {
	echo "<div class='alert alert-success' role='alert'>You have successfully logged out</div>";
}
else if ($successMsg == "newpoll" )  {
	echo "<div class='alert alert-success' role='alert'>Congrats! You have created a new poll.</div>";
}
  }
  
?>
<?php $result = mysqli_query($conn,"SELECT id, pollname FROM polls");
while($row = mysqli_fetch_array($result))
{
echo "<div class='row poll-row'>";
echo "<div class='col-md-12 poll'><h4>" . $row['pollname'] . "</h4>";
echo "<a href='poll.php?id=". $row['id'] . "'><button type='button' class='btn btn-primary'>LET'S GO</button></a>";
echo "</div></div>";
}
?>
<?php include('jsfiles.php');?>
</body>
</html>