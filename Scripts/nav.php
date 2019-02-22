<?php 
session_start();
require_once '../Scripts/bootstrap_jquery_links.php';
 ?>


<link rel="stylesheet" type="text/css" href="../Scripts/bootstrap.css">

<style type="text/css">


body {
  background-color: black;
  
}

nav {
  z-index: 0;
}



</style>





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
	      echo '<a class="nav-link" href="../Pages/plans.php">Plan Directory</a>';
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

