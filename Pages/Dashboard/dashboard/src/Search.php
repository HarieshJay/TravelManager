<?php

header('Access-Control-Allow-Origin: *');

?>

<?php


session_start();

$location = strval($_SESSION['country']);
$node = strval($_SESSION['user_id']);
$type = 'SearchByGenres';
$match = 'MatchAny';
$genre = strval($_GET['genres']);

$search = "java -jar tango.jar $location $node $type $match $genre";

// exec("java -jar tango.jar " .$location ." " .$node. " " . $type . " " . $match . " " . $genre , $response);

// exec( $search , $response);

// java -jar tango.jar HR 3 SearchByGenres MatchAny Pop


exec( "java -jar tango.jar HR 3 SearchByGenres $match $genre 2>&1", $response);

// echo ( "java -jar tango.jar HR 3 SearchByGenres MatchAny Pop" == $search);


// echo $search;

print_r($response[6]);



?>