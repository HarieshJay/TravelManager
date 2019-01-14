<?php 


include '../Scripts/nav.php'; 
require_once '../Scripts/pdo.php';
session_start();


$plan_name = $_POST['plan_name'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$city_start = $_POST['city_start'];
$state_start = $_POST['state_start'];
$code_start = $_POST['code_start'];
$city_end = $_POST['city_end'];
$state_end = $_POST['state_end'];
$code_end =$_POST['code_end'];
$notes =$_POST['notes'];

$sql = 'INSERT INTO PlanInfo( plan_name, date_start, date_end, city_start, city_end, state_start, state_end, code_start, code_end, notes) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

$stmt = $pdo->prepare($sql);
$stmt->execute([$plan_name, $date_start, $date_end, $city_start, $city_end, $state_start, 
	$state_end, $code_start, $code_end, $notes]);




?>




<!DOCTYPE html>
<html class="h-100">
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="../bootstrap.css">

	<style type="text/css">
		html { background-image: url(../Images/background.jpg);
  				background-size: cover;
  				background-attachment: fixed;
  				background-position: center;
  				background-repeat: no-repeat;
  				background-size: cover; }

  		body {  }

	</style>

</head>
<body class="h-100 pt-5">

	

	<h1 class="display-4 text-center m-5">Create Trip</h1>


	<form method="post" class="m-4" name="form">
		<div class="container form-group text-white bg-dark p-4">
			<h4 class="mb-4 text-center">Name your Adventure</h4>
			<div class="row form-group">
    			<input type="text" class="form-control" id="TripName" placeholder="Enter Trip Name"
    			name="plan_name">
			</div>
			<h4 class="m-4 text-center">Time Frame:</h4>
			<div class="row form-group">
				<div class="col-6">
					<label for="StartDate" >Start Date</label>
					<input type="date" name="date_start" class="form-control" >
				</div>
				<div class="col-6">
					<label for="EndDate">End Date</label>
					<input type="date" name="date_end" class="form-control" >
				</div>
			</div>
			<h4 class="m-4 text-center">Start Location:</h4>
			<div class="row form-group">
				<div class="col-lg col-md-12" >
					<label for="StartCity">City</label>
					<input type="text" name="city_start" class="form-control">
				</div>
				<div class="col-lg col-md-12">
					<label for="StartState">State/Province</label>
					<input type="text" name="state_start" class="form-control">
				</div>
				<div class="col-lg col-md-12">
					<label for="StartCode">Zip/Postal Code</label>
					<input type="text" name="code_start" class="form-control">
				</div>
			</div>
			<h4 class="m-4 text-center">End Location:</h4>
			<div class="row form-group">
				<div class="col-lg col-md-12" >
					<label for="EndCity">City</label>
					<input type="text" name="city_end" class="form-control">
				</div>
				<div class="col-lg col-md-12">
					<label for="EndState">State/Province</label>
					<input type="text" name="state_end" class="form-control">
				</div>
				<div class="col-lg col-md-12">
					<label for="EndCode">Zip/Postal Code</label>
					<input type="text" name="code_end" class="form-control">
				</div>
			</div>
			<div class="form-group">
    			<h4 class="m-4 text-center">Other Notes:</h4>
    			<textarea class="form-control" id="note" name="notes" rows="3"></textarea>
  			</div>


  			<div class="form-group text-center m-4">
				<button type="submit" class="btn btn-secondary btn-lg">Save Plan</button>
			</div>












		</div>
	</form>












<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


</body>
</html> 