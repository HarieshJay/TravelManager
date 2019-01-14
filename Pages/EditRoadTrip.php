<?php 


include 'nav.php'; 
require_once 'pdo.php';
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


header('Location: CreateR');



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
