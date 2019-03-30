<?php

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
 
    // select all query
    // $query = "SELECT
    //             c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
    //         FROM
    //             " . $this->table_name . " p
    //             LEFT JOIN
    //                 categories c
    //                     ON p.category_id = c.id
    //         ORDER BY
    //             p.created DESC";


    $query = "SELECT * FROM $this->table_name";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
    
}


function create() {
$sql = 'INSERT INTO PlanInfo(  plan_name, date_start, date_end, city_start, city_end, state_start, state_end, code_start, code_end, notes) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

$stmt = $pdo->prepare($sql);

if ($stmt->execute( [$plan_name, $date_start, $date_end, $city_start, $city_end, $state_start, $state_end, $code_start, $code_end, $notes])){
    return true;
}
return false;




}
    

}






?>