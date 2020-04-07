 <?php  
include('config.php');  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:index.php");  
 }    
 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["email"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {   
 $username = mysqli_real_escape_string($conn, $_POST["email"]);  
           $password = mysqli_real_escape_string($conn, $_POST["password"]);  
           $password = md5($password);  
           $query = "SELECT * FROM users WHERE email = '" . $username . "' AND password = '" . $password . "'";  
           $result = mysqli_query($conn, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['username'] = $username;  
                header("location:index.php?msg=success");  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 }  
 ?>  
 <html>
<head>
<title><?php echo $selectedPoll?></title>
<?php include('cssfiles.php'); ?>
</head>
<body>
<?php include('nav.php');?>
<div class="container-fluid">
<div class="page-title"><h1>Login</h1></div> 
	 <form method="post">  
                     <label>Enter Username</label>  
                     <input type="text" name="email" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Login" class="btn btn-info" />  
                     <br />  
                </form>  
 
           </div>  
      </body>  
 </html>  