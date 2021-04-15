<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "MorseGQ";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
  die("Connection failed: ".mysqli_error($conn));
}

?>
