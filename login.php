<?php 
require_once "pdo.php" 

// $EmailEntered = $_POST['Email']
// $Password_sha1 = sha1($_POST['Password'])

// $sql = "SELECT username FROM users"
// $sqp .= "WHERE e=:e AND password=:p"

// $stmt = $pdo->prepare($sql)




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
<?php include 'nav.php'; ?>
<body class="pt-5">


	<div class="h-100 container">
		

			<h1 class="text-center display-4 m-5 ">Login Information</h1>


		<div class="row justify-content-around align-items-start">

			<div class="col-md-5 card bg-dark text-white">
				<div class="card-body">
					<h5 class="card-title">Login</h5>
						<form method="post">
							  <div class="form-group">
							    <label for="Email">Email address</label>
							    <input type="email" class="form-control" id="Email" 
							    name="Email" aria-describedby="emailHelp" placeholder="Your Email">
							    
							  </div>
							  <div class="form-group">
							    <label for="Password">Password</label>
							    <input type="password" class="form-control" id="Password" placeholder="Password" name="Password">
							  </div>
							  
							  <button type="submit" class="btn btn-primary ">Submit</button>
						</form>
				</div>
			</div>
		</div>


		<!-- <div class="row">
			<div class="card bg-dark text-white m-4 p-2 col-12 ">
				<div class="row justify-content-around align-items-start">
					<p>Don't have an account? Create one here.</p>
				</div>
				<div class="row justify-content-around align-items-start">
				<a href="register.php" class="btn btn-primary">Register</a>
				</div>
			</div>
		
		</div> -->

		<div class="row justify-content-around align-items-start mt-4">

			<div class="col-md-5 card bg-dark text-white">
				<div class="card-body">
					<h5 class="card-title">Don't have an account?</h5>

					<a href="register.php" class="btn btn-primary">Register</a>
						
				</div>
			</div>
		</div>




	</div>
















 
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


</body>
</html>