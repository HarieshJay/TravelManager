<?php 
require_once "../Scripts/pdo.php";
include '../Scripts/nav.php';
session_start();


if (isset($_POST['Submit'])){



			if ( ( empty($_POST['username']) ||  empty($_POST['email']) || empty($_POST['Password1']) || empty($_POST['Password2']) )) {
				$_SESSION["nullError"] = "True";
				header("Location: register.php");
						exit();			
			} else {


						$email = trim($_POST['email']);
						$password1 = trim($_POST['Password1']);
						$password2 = trim($_POST['Password2']);
						$username = trim($_POST['username']);


						//Check username availability
						$sql = 'SELECT Count(username) As num From Users WHERE username = ?';
						$stmt = $pdo->prepare($sql);
						$stmt->execute([$username]);
						$usernameNum = $stmt->fetch(PDO::FETCH_ASSOC);
						


						//Check email availability
						$sql = 'SELECT Count(email) As num From Users WHERE email = ?';
						$stmt = $pdo->prepare($sql);
						$stmt->execute([$email]);
						$emailNum = $stmt->fetch(PDO::FETCH_ASSOC);

						//Password check

						$password1Hash = password_hash($password1, PASSWORD_BCRYPT, array("cost" => 12) );



						if ( $usernameNum['num'] > 0 ){
						$_SESSION['usernameE'] = $username ;
						

						} else if ( $emailNum['num'] > 0){
							echo $emailNum['Num'];
							$_SESSION['emailE'] = $email;
						
						} else if ( ($password1 != $password2)){
							$_SESSION['passwordE'] = "Do not Match";
					
						} else {
							$_SESSION['logged_in'] = time();
							$sql = 'INSERT INTO Users ( username, password, email ) VALUES( ? , ? , ?  )';
							$stmt = $pdo->prepare($sql);
							$stmt->execute([$username, $password1Hash, $email]);

							$sql = 'SELECT user_id From Users where username = ?';	
							$stmt = $pdo->prepare($sql);
							$stmt->execute([$username]);
							$user_id = $stmt->fetch(PDO::FETCH_ASSOC);
							$_SESSION["user_id"] = $user_id;
							$_SESSION['username'] = $username;
							
						}


						header("Location: register.php");
						exit();


					}

			}

			


			if ( isset($_SESSION['logged_in'])){
							

							header("Location: plans.php");
							exit();
							}

			
			if (isset($_SESSION["nullError"])){
				echo '<div class="alert alert-danger" role="alert">';
				echo '<strong>Darn!</strong> Please enter all the required information.';
				echo '</div>';
				unset($_SESSION["nullError"]);
			}

			else if (isset($_SESSION["usernameE"])){
				echo '<div class="alert alert-danger" role="alert">';
				echo '<strong>Darn!</strong> Username is taken';
				echo '</div>';
				unset($_SESSION["usernameE"]);
			}
			else if (isset($_SESSION["passwordE"])){
				echo '<div class="alert alert-danger" role="alert">';
				echo '<strong>Darn!</strong> Passwords do not match';
				echo '</div>';
				unset($_SESSION["passwordE"]);
			}
			else if (isset($_SESSION["emailE"])){
				echo '<div class="alert alert-danger" role="alert">';
				echo '<strong>Dratz!</strong> Email is already used in another account.';
				echo '</div>';
				unset($_SESSION["emailE"]);
			}

			



?>



<!DOCTYPE html>
<html class="h-100">
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="../bootstrap.css">
	<style type="text/css">
		html { 
					/* background-image: url(../Images/background.jpg); */
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

	


	<div class="h-100 container">
		

			<h1 class="text-center display-4 p-5 ">Register</h1>


		<div class="row h-100 justify-content-around align-items-start">

		

			<div class="col-md-5 card bg-dark text-white">
				<div class="card-body">
					<h5 class="card-title ">Register</h5>
						<form method="post">
							  <div class="form-group">
							    <label for="email">Email address</label>
							    <input type="email" class="form-control" id="email" 
							    name="email" aria-describedby="emailHelp" placeholder="Your email">
							  </div>
							  <div class="form-group">
							    <label for="username">Username</label>
							    <input type="text" class="form-control" id="username" 
							    name="username" placeholder="Your Username" minlength="6">
							  </div>
							  <div class="form-group">
							    <label for="Password1">Password</label>
							    <input type="password" class="form-control" id="Password1" placeholder="Password" name="Password1" minlength="6">
							  </div>
							  <div class="form-group">
							    <label for="Password2">Re-type Password</label>
							    <input type="password" class="form-control" id="Password2" placeholder="Re-type Password"  minlength="6" name="Password2">
							  </div>
							  
							  <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
						</form>	
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