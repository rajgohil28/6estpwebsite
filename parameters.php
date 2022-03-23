<?php
header('Content-Type: application/json');

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'u997405966_6eresources');
define('DB_PASSWORD', 'qwerty12345@V');
define('DB_NAME', 'u997405966_6estp');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
    die("Connection failed: " . $mysqli->error);
}

$query = sprintf("SELECT time, BOD, COD, DO, ph, temp FROM parameters");

$result = $mysqli->query($query);

$data = array();
foreach($result as $row){
    $data[] = $row;
}
$result->close();
$mysqli->close();

print json_encode($data);