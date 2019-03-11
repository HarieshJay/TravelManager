<?php 
require_once "../Scripts/pdo.php";
include '../Scripts/nav.php';

session_start();

if (isset($_POST['Submit'])){



			if ( ( empty($_POST['email']) &&  empty($_POST['password']) )) {
				$_SESSION["empty_information"] = "set";
				header("Location: login.php");
			
			}


			if ( ( isset($_POST['password']) && isset($_POST['email'])  )) {


						$email = trim($_POST['email']);
						$password = trim($_POST['password']);
						

						//Check user
						$sql = 'SELECT user_id, password, username from Users WHERE email = ?';
						$stmt = $pdo->prepare($sql);
						$stmt->execute([$email]);
						$user = $stmt->fetch(PDO::FETCH_ASSOC);

						if ($user === false ){
							$_SESSION['wrong_user'] = "User not Found"; 

						}

						else {

							$password_check = password_verify($password, $user['password']);

							if ($password_check){

								$_SESSION['user_id'] = $user['user_id'];
								$_SESSION['username'] = $user['username'];
								$_SESSION["logged_in"] = "Logged_in";
								header("Location: plans.php");
								exit();

							
							}

							else {
								$_SESSION['wrong_password'] = "Incorrect password";
								header("Location: login.php");
								exit();

							}


						




						}




						

						


						


					}

			}

			


			if ( isset($_SESSION['logged_in'])){
				header("Location: home.php");
				exit();
				}

			

			if (isset($_SESSION["wrong_user"])){
				unset($_SESSION["wrong_user"]);
				echo '<div class="alert alert-danger" role="alert">';
				echo '<strong>Darn!</strong> Email is not Found.';
				echo '</div>';
			
			}

			if (isset($_SESSION["wrong_password"])){
				echo '<div class="alert alert-danger" role="alert">';
				echo '<strong>Darn!</strong> Password is Incorrect.';
				echo '</div>';
				unset($_SESSION["wrong_password"]);
			}

			if (isset($_SESSION["empty_information"])){
				echo '<div class="alert alert-danger" role="alert">';
				echo '<strong>Darn!</strong> Please enter all the required information.';
				echo '</div>';
				unset($_SESSION["empty_information"]);
			}

			unset($_SESSION["wrong_user"]);
			unset($_SESSION["wrong_password"]);
			unset($_SESSION["empty_information"]);
			




?>







<!DOCTYPE html>
<html class="h-100">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../Scripts/bootstrap.css">
    <script src="../Scripts/JavaScript/jquery.background-video.js"></script>
    <link rel="stylesheet" type="text/css" href="../Scripts/JavaScript/jquery.background-video.css">


		<style type="text/css">
		
  


    video {
        top: 0;
        left: 0;
				z-index: -1;
				Height: 110%;
				overflow-x: hidden;
				position: absolute;
    		margin-left: auto;
    		margin-right: auto;
				
    }

    #content {
        z-index: 10;

		}
		
		.my-background-video{

			z-index : -100;
			

		}

		body{
			overflow-x: hidden;
			overflow-y: hidden;
		}
    </style>







</head>

<body class="element-with-video-bg jquery-background-video-wrapper w-100 h-100">


    <video class="my-background-video jquery-background-video" loop autoplay muted playsinline
        poster="path/to/your/poster.jpg">
        <source src="../Images/trees.mov" type="video/mp4">
    </video>


    <div id="content" class="mb-4">


        <h1 class="text-center display-4 m-5 ">Login Information</h1>


        <div class="row justify-content-around align-items-start">

            <div class="col-md-5 card bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <form method="post">
                        <div class="form-group">
                            <label for="Email">Email address</label>
                            <input type="email" class="form-control" id="Email" name="email"
                                aria-describedby="emailHelp" placeholder="Your Email">

                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" class="form-control" id="Password" placeholder="Password"
                                name="password">
                        </div>

                        <button type="submit" name="Submit" class="btn btn-primary ">Submit</button>
                    </form>
                </div>
            </div>
        </div>




        <div class="row justify-content-around align-items-start mt-4">

            <div class="col-md-5 card bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title">Don't have an account?</h5>

                    <a href="../Pages/register.php" class="btn btn-primary">Register</a>

                </div>
            </div>
        </div>




    </div>





</body>

</html>