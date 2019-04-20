<?php

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// get database connection
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

session_start();


$user_id = $_SESSION['user_id'];

$user_id = 7;


$data = json_decode(file_get_contents("php://input"));
// $data is the JSON encoded POST data, if any, as an object.


$sql = 'INSERT INTO Tasks (  user_id , plan_id , task_name  , task_details , completed) VALUES ( ?, ?, ?, ?, ?)';

$stmt = $db->prepare($sql);



if ($stmt->execute( [$user_id, $data->plan_id, $data->task_name, $data->task_details, $data->task_completed ])){
    echo "success";
    return true;
}
echo "could not execute";
return false;









?>