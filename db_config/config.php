<?php 

$server = "localhost";
$username = "root";
$password = "";
$database = "ait-portal";

try {
    $connection =  new PDO("mysql:host=$server;dbname=$database",$username,$password);

    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException  $e){
    die("Error : Could not connect..". $e->getMessage());
}

?>