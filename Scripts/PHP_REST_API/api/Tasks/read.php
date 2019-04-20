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




$database = new Database();
$db = $database->getConnection();


session_start();






$sql = 'SELECT * FROM Tasks where plan_id = ?';
$stmt = $db->prepare($sql);



$data = json_decode(file_get_contents("php://input"));



// Session user_id will not work because login.php uses different session data
// uncomment when login.php uses config/database.php
// $user_id = $_SESSION['user_id'];


// $stmt->execute([$data->plan_id]);
 
$stmt->execute([$data->plan_id]);

$num = $stmt->rowCount();

if($num>0){
 
    // products array
    $task_arr=array();
    $task_arr["tasks"] = array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $task_info=array(
            "plan_id" => $plan_id,
            "user_id" => $user_id,
            "task_id" => $task_id,
            "task_name" => $task_name,
            "task_details" => $task_details,
            "completed" => $completed
            
        );
 
        array_push($task_arr["tasks"], $task_info);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($task_arr);
}
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => $_POST)
    );
}


 

?>