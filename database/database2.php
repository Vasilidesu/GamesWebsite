<?php
// connectie naam
$host = "localhost";
$db_name = "";

//Inloggen
$username = "";
$password = "";
 
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    
}
 
// voor een error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>