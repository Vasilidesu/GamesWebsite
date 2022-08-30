<?php
include 'database2.php';
 
try {
 
    // Pak de ID
    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
    // verwijder van de database
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bindParam(1, $id);
 
    if($stmt->execute()){
        //Terugsturen naar home
        header('Location: edit.php');
    }else{
        die('Unable to delete record.');
    }
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>