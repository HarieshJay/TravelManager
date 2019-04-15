<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$database = new Database();
$db = $database->getConnection();

session_start();


$user_id = $_SESSION['user_id'];


// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../datastorage/plan.php';
 


$data = json_decode(file_get_contents("php://input"));
// $data is the JSON encoded POST data, if any, as an object.

$plan = new Plan($db);

if ( !empty($data->plan_name)){

    $plan->user_id = $user_id;
    $plan->plan_name = $data->plan_name;
    $plan->date_start = $data->date_start;
    $plan->date_end = $data->date_end;
    $plan->city_start = $data->city_start;
    $plan->state_start = $data->state_start;
    $plan->code_start = $data->code_start;
    $plan->city_end = $data->city_end;
    $plan->state_end = $data->state_end;
    $plan->code_end = $data->code_end;


if ($plan->create()){
    http_response_code(201);

    echo json_encode(array("message" => "Plan was created."));

}

else {

    http_response_code(503);

    echo json_encode(array("message" => "Plan was not created."));


}

}

else {

    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create plan. Data is incomplete."));
}
?>