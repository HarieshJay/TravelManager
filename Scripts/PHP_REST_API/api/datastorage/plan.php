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

Class Plan{
    private $conn;
    private $table_name = "PlanInfo";

    public $plan_id;
    public $user_id;
    public $plan_name;
    public $date_start;
    public $date_end;
    public $city_start;
    public $state_start;
    public $code_start;
    public $city_end;
    public $state_end;
    public $code_end;

    public $notes;


    public function __construct($db){
        $this->conn = $db;
    }


function read(){
 
 
    $query = "SELECT * FROM $this->table_name where user_id = ?";
    $user_id = $_SESSION['user_id'];
    // $user_id = 7;
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute([$user_id]);
    
    return $stmt;
    
}


function create() {


$sql = 'INSERT INTO PlanInfo(  user_id , plan_name, date_start, date_end, city_start, city_end, state_start, state_end, code_start, code_end, notes) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

$stmt = $this->conn->prepare($sql);



if ($stmt->execute( [$this->user_id, $this->plan_name, $this->date_start, $this->date_end, $this->city_start, $this->city_end, $this->state_start, $this->state_end, $this->code_start, $this->code_end, $this->notes])){
    return true;
}
return false;




}





    

}






?>