<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$database = new Database();
$db = $database->getConnection();

session_start();


// uncomment when login.php uses config/database.php
$user_id = $_SESSION['user_id'];


// $user_id = 7;


// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../datastorage/plan.php';

$data = json_decode(file_get_contents("php://input"));
// $data is the JSON encoded POST data, if any, as an object.
 




$sql = 'DELETE FROM PlanInfo where plan_name = ? and user_id = ?';
$stmt = $db->prepare($sql);

if (! $stmt->execute([$data->plan_name, $user_id])){
    
 
        // set response code - 404 Not found
        http_response_code(404);
     
        // tell the user no products found
        echo json_encode(
            array("message" => "No Products Founds")
        );
    
}





?>