<?php 

session_start()
 ?>

<link rel="stylesheet" type="text/css" href="../bootstrap.css">
<style type="text/css">
		html { background-image: url(../Images/background.jpg);
  				background-size: cover;
  				background-attachment: fixed;
  				background-position: center;
  				background-repeat: no-repeat;
  				background-size: cover; }
</style>



 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">

	    <span class="justify-content-start" >
    	<a href="https://harieshjay.github.io/" ><img src="../Images/logo.png" style="width: 30px; margin-right: 10px"></a>
    	</span>
    	

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
	</button>
	

	<div class="collapse navbar-collapse justify-content-end " id="navbarText">

	    <ul class="navbar-nav ml-auto justify-content-end">
	      
	      <?php 
	      if ( ! isset($_SESSION['logged_in'])){ 
	      echo '<li class="nav-item">';
	      echo '<a class="nav-link" href="../Pages/index.php">Home</a>';
	      echo '</li>';
	      echo '<li class="nav-item">';
	      echo '  <a class="nav-link" href="../Pages/login.php">Login</a>';
	      echo '</li>';


	  		} ?>

	      
	      <?php 
	      if ($_SESSION['logged_in']){ 
	      echo '<li class="nav-item">';
	      echo '<a class="nav-link" href="../Pages/home.php">Home</a>';
	      echo '</li>';
	      echo '<li class="nav-item">';
	      echo '<a class="nav-link" href="../Pages/createroadtrip.php">Create New Trip</a>';
	      echo '</li>';
	      echo '<li class="nav-item">';
	      echo '<a class="nav-link" href="../Scripts/logout.php">Logout</a>';
	      echo '</li>';
	      
	  		}
	      ?>
	    </ul>

	</div>

	</nav>

</div>

<!-- <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


 -->