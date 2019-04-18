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

$database = new Database();
$db = $database->getConnection();

session_start();


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