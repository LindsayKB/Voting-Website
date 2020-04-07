
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php">Voting App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
	<?php
	  if (isset($_SESSION['username'])){
	   echo '<li class="nav-item">
        <a class="nav-link" href="logout.php">Log Out</a>
      </li>';
	  }
	  else {
		 echo '<li class="nav-item">
        <a class="nav-link" href="login.php">Log In</a>
      </li>';
	     echo '<li class="nav-item">
        <a class="nav-link" href="signup.php">Sign Up</a>
      </li>';
	  }
	  ?>
	  <?php
	 if (isset($_SESSION['username'])){
	   echo '<li class="nav-item">
        <a class="nav-link" href="createpoll.php">Create Poll</a>
      </li>';
	  }
	  ?>
    </ul>
  </div>
</nav>