<?php 
session_start();
require_once '../Scripts/bootstrap_jquery_links.php';
 ?>


<link rel="stylesheet" type="text/css" href="../Scripts/bootstrap.css">

<style type="text/css">


body {
  background-color: black;
  
}

.nav {
  z-index: 0;
  background-color: rgba(255,255,255,0.5);

}

#logo {

  width: 50px;

  
}







</style>





<nav class="navbar navbar-expand-lg fixed-top mb-4">

	    <span class="justify-content-start" >
    	<a href="https://harieshjay.github.io/" ><img src="../Images/logo.png" id="logo" class="m-2"></a>
    	</span>
    	

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
	</button>
	

	<div class="collapse navbar-collapse justify-content-end " id="navbarText">

	    <ul class="navbar-nav ml-auto justify-content-end">
	      
	      <?php 
	      if ( ! isset($_SESSION['logged_in'])){ 
	      // echo '<li class="nav-item">';
	      // echo '<a class="nav-link" href="../Pages/index.php">Home</a>';
	      // echo '</li>';
	      echo '<li class="nav-item">';
        echo '  <a class="nav-link" href="../Pages/login.php"><button type="button" class="btn btn-secondary btn-lg px-4 m-2 m-3">Login Here</button></a>';
	      echo '</li>';
	  		} ?>

	      
	      <?php 
	      if ($_SESSION['logged_in']){ 
	      // echo '<li class="nav-item">';
	      // echo '<a class="nav-link" href="../Pages/plans.php">Plan Directory</a>';
	      // echo '</li>';
	      // echo '<li class="nav-item">';
	      // echo '<a class="nav-link" href="../Pages/createroadtrip.php">Create New Trip</a>';
	      // echo '</li>';
	      // echo '<li class="nav-item">';
	      // echo '<a class="nav-link" href="../Scripts/logout.php">Logout</a>';
        // echo '</li>';
        
        // redirect to home Angular page
	      
	  		}
	      ?>
	    </ul>


      </div>

	</nav>

