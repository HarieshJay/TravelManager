<?php

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
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute([$user_id]);
    
    return $stmt;
    
}


function create() {


$sql = 'INSERT INTO PlanInfo(  user_id , plan_name, date_start, date_end, city_start, city_end, state_start, state_end, code_start, code_end, notes) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

$stmt = $this->conn->prepare($sql);

echo "";



if ($stmt->execute( [$this->user_id, $this->plan_name, $this->date_start, $this->date_end, $this->city_start, $this->city_end, $this->state_start, $this->state_end, $this->code_start, $this->code_end, $this->notes])){
    return true;
}
return false;




}


    

}






?>