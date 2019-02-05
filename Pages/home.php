<?php 
require_once "../Scripts/pdo.php" ;
include '../Scripts/nav.php';

session_start();
 
$sql = 'SELECT * FROM PlanInfo where user_id = ?';

$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['user_id']]);

while($row = $stmt->fetch()){
	
}






?>



<!DOCTYPE html>
<html class="h-100">
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	
	<!-- <a href="harieshjay.github.io"><img src="logo.png" style="width: 30px"></a> -->

</head>

<body class="pt-5">


	<div class="h-100 container">
		

			<h1 class="text-center display-4 m-5 ">Welcome Back</h1>


 
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


</body>
</html>