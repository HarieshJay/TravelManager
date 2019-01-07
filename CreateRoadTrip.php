<?php 




include 'nav.php'; 




?>




<!DOCTYPE html>
<html class="h-100">
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="bootstrap.css">


	<!-- <a href="harieshjay.github.io"><img src="logo.png" style="width: 30px"></a> -->

</head>
<body class="h-100">

	

	<h1 class="display-4 text-center m-4">Create Trip</h1>


	<form method="post" class="m-4" name="form">
		<div class="container form-group text-white bg-dark p-4">
			<h4 class="mb-4 text-center">Name your Adventure</h4>
			<div class="row form-group">
    			<input type="text" class="form-control" id="TripName" placeholder="Enter Trip Name"
    			name="TripName">
			</div>
			<h4 class="m-4 text-center">Time Frame:</h4>
			<div class="row form-group">
				<div class="col-6">
					<label for="StartDate" >Start Date</label>
					<input type="date" name="StartDate" class="form-control" >
				</div>
				<div class="col-6">
					<label for="EndDate">End Date</label>
					<input type="date" name="EndDate" class="form-control" >
				</div>
			</div>
			<h4 class="m-4 text-center">Start Location</h4>
			<div class="row form-group">
				<div class="col-lg col-md-12" >
					<label for="StartCity">City</label>
					<input type="text" name="StartCity" class="form-control">
				</div>
				<div class="col-lg col-md-12">
					<label for="StartState">State/Province</label>
					<input type="text" name="StartState" class="form-control">
				</div>
				<div class="col-lg col-md-12">
					<label for="StartCode">Zip/Postal Code</label>
					<input type="text" name="StartCode" class="form-control">
				</div>
			</div>
			<h4 class="m-4 text-center">End Location</h4>
			<div class="row form-group">
				<div class="col-lg col-md-12" >
					<label for="EndCity">City</label>
					<input type="text" name="EndCity" class="form-control">
				</div>
				<div class="col-lg col-md-12">
					<label for="EndState">State/Province</label>
					<input type="text" name="EndState" class="form-control">
				</div>
				<div class="col-lg col-md-12">
					<label for="EndCode">Zip/Postal Code</label>
					<input type="text" name="EndCode" class="form-control">
				</div>
			</div>
			<div class="form-group">
    			<h4 class="m-4 text-center">Other Notes</h4>
    			<textarea class="form-control" id="note" rows="3"></textarea>
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