<?php

//Calls the read function in plan.php which plans that the user_id that
// was verified in the login page.

// 
// 
// 

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

include_once '../config/database.php';
include_once '../datastorage/plan.php';




$database = new Database();
$db = $database->getConnection();


session_start();






$sql = 'SELECT * FROM PlanInfo where user_id = ?';
$stmt = $db->prepare($sql);


$user_id = 7;

// Session user_id will not work because login.php uses different session data
// uncomment when login.php uses config/database.php
// $user_id = $_SESSION['user_id'];


$stmt->execute([$user_id]);
 


$num = $stmt->rowCount();

if($num>0){
 
    // products array
    $plans_arr=array();
    $plans_arr["plans"] = array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $plan_info=array(
            "plan_id" => $plan_id,
            "user_id" => $user_id,
            "plan_name" => $plan_name,
            "date_start" => $date_start,
            "date_end" => $date_end,
            "notes" => html_entity_decode($notes),
            "city_start" => $city_start,
            "state_start" => $state_start,
            "code_start" => $code_start,
            "city_end" => $city_end,
            "state_end" => $state_end,
            "code_end" => $code_end
        );
 
        array_push($plans_arr["plans"], $plan_info);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($plans_arr);
}
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => $user_id)
    );
}


 

?>