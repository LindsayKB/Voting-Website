<?php
include('config.php');
include('session.php');

 if(isset($_POST["newQuestion"]))  
 {  
      if(empty($_POST["question"]) && empty($_POST["options"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {   
			/*Process fields*/
			$sql = 'INSERT INTO polls (pollname, email)
			VALUES ("' . $_POST["question"] . '", "' . $_SESSION['username'] . '");';
			mysqli_query($conn, $sql) or die('Error, insert query failed. This is it:' . $sql);
			
		   $options = preg_split ("/\,/", $_POST["options"]);
		   
		   foreach ($options as $val) {
				str_replace('"','',$val);
				$sql = 'INSERT INTO polloptions (pollname, optionname, total)
				VALUES ("' . $_POST["question"] . '", "' . $val . '" , 0);';
				mysqli_query($conn, $sql) or die('Error, insert query failed. This is it:' . $sql);
			}  
             header("location:index.php?msg=newpoll"); 
      }  
 } 
?>
<html>
<head>
<title>Voting App</title>
<?php include('cssfiles.php'); ?>
</head>
<body>
<?php include('nav.php');?>
<div class="container">
<center><h1>Welcome to the Voting App</h1></center>
	 <form method="post">  
                     <label>What's the question?</label>  
                     <input type="text" name="question" class="form-control" />  
                     <br />  
                     <label>Options (seperated by commas)</label>  
                     <textarea name="options" class="form-control" />  
					 </textarea>
					 <br>
                     <input type="submit" name="newQuestion" value="Submit" class="btn btn-info" />  
                     <br />  
                </form>  	

<?php include('jsfiles.php');?>
</body>
</html>