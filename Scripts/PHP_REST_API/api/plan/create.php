<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../datastorage/plan.php';
 
$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

$plan = new Plan($db);



if ( !empty($data->name)){

    $plan->plan_name = $data->plan_name;
    $plan->date_start = $data->plan;
    $plan->date_end = $data->plan;
    $plan->city_start = $data->plan;
    $plan->state_start = $data->plan;
    $plan->code_start = $data->plan;
    $plan->city_end = $data->plan;
    $plan->state_end = $data->plan;
    $plan->code_end = $data->plan;


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

























>