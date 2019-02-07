<?php 

// check if the user_id in $_GET is the same as the one in the $_SESSION

session_start();
require_once "../Scripts/pdo.php";
require_once '../Scripts/not_logged_in.php';


if (isset($_GET['user_id'])){


	if ( $_GET['user_id'] != $_SESSION['user_id']){
		header("Location: ../Pages/plans.php");
	}
}




 ?>