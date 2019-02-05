<?php 
require_once "../Scripts/pdo.php" ;
include '../Scripts/nav.php';

session_start();
 
$sql = 'SELECT * FROM PlanInfo where user_id = ?';

$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['user_id']]);








?>



<!DOCTYPE html>
<html class="h-100">
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../bootstrap.css">

	<style type="text/css">
		html { background-image: url(../Images/plans.jpg);
  				background-size: cover;
  				background-attachment: fixed;
  				background-position: center;
  				background-repeat: no-repeat;
  				background-size: cover; }

  		body { overflow-y:hidden; }



  


	</style>

	
	<!-- <a href="harieshjay.github.io"><img src="logo.png" style="width: 30px"></a> -->

</head>

<body class="pt-5">

	<div id="title" class="rounded text-center ">
		<h1 class="text-center display-2 m-4">Plan Directory</h1>
	</div>
	
	

	

	<div class="h-100 container mb-5 text-center" id="plans">

		<!-- <div class="row text-center">
			<form class="form-inline mr-auto">
  				<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
  				<button class="btn blue-gradient btn-rounded btn-sm my-0" type="submit">Search</button>
			</form>
		</div> -->


		<div class="text-center">
			<button type="button" class="btn btn-success btn-lg mb-3" onclick="window.location.href = 'createroadtrip.php';">Create New Plan</button>
          
          
        </div>



		<?php 

		while($row = $stmt->fetch() ){

		echo '<div class="row mb-3">';

		echo'	<div class="col-12 card bg-dark text-white">';
		echo'		<div class="card-body row">';
		echo'			<div class="text-left col-8">';
		echo"			<h3>";
							print_r($row['plan_name']);
		echo"			</h3>";
		echo'			</div>';

		echo'			<div class="text-right col-4">';
		echo'				<button type="button" class="btn btn-primary">View</button>';
		echo'				<button type="button" class="btn btn-danger">Delete</button>';
		echo'			</div>';
					
		echo'		</div>';
		echo'	</div>';


		echo'</div>';

	
		}








		 ?>
			



	</div>











 
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>
</html>