<?php 

session_start();
require_once "../Scripts/pdo.php";
require_once '../Scripts/not_logged_in.php';
require_once '../Scripts/user_get_authentication.php';


if (! ( isset($_GET['plan_id']) &&  isset($_GET['user_id']) )){
	header("Location: ../Pages/plans.php");
}

if ( $_GET['user_id'] != $_SESSION['user_id']){
	header("Location: ../Pages/plans.php");
}


$sql = 'DELETE FROM PlanInfo where plan_id = ? and user_id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET["plan_id"], $_SESSION['user_id']]);

header("Location: ../Pages/plans.php");



 ?>