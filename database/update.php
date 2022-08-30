<!DOCTYPE HTML>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/icon.ico">
    <link rel="stylesheet" href="../algemeen.css">
    <link rel="stylesheet" href="database.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>CCP OFFICIAL - UPDATE</title>
</head>
<body>

<header>
    <div class="slides">
        <img src="../media/banner1.png">
    </div> 
    <div class="slides">
        <img src="../media/banner2.png">
    </div>
    <div class="slides">
        <img src="../media/banner3.png">
    </div>
</header>

<aside>
    <nav id="sidenav">
        <button id="navbtn" onclick="openclose()">☰</button> 
        <ul>
            <li><a href="../index.html"><img src="../media/home.png">Home</a></li>
            <li><a href="database.php"><img src="../media/overzicht.png">Overzicht</a></li>
            <li><a href="edit.php"><img src="../media/edit.png">Edit</a></li>
        </ul>
    </nav> 
</aside>
 
    <!-- container -->
    <div class="container">
 
        <div class="page-header">
            <h1>Update Game</h1>
        </div>
 
        <?php

$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
include 'database2.php';

try {
    //van de database selecteren
    $query = "SELECT id, name, description, price, Author, Platform FROM products WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
    

    $stmt->bindParam(1, $id);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
    $Author = $row['Author'];
    $Platform = $row['Platform'];
}
 
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
 
 <?php
 
 if($_POST){
  
     try{
        //hier updaten in de database
         $query = "UPDATE products
                     SET name=:name, description=:description, price=:price, Author=:Author, Platform=:Platform
                     WHERE id = :id";
  
         $stmt = $con->prepare($query);
         //hier updaten we de code voor de pagina

         $name=htmlspecialchars(strip_tags($_POST['name']));
         $description=htmlspecialchars(strip_tags($_POST['description']));
         $price=htmlspecialchars(strip_tags($_POST['price']));
         $Author=htmlspecialchars(strip_tags($_POST['Author']));
         $Platform=htmlspecialchars(strip_tags($_POST['Platform']));

         $stmt->bindParam(':name', $name);
         $stmt->bindParam(':description', $description);
         $stmt->bindParam(':price', $price);
         $stmt->bindParam(':Author', $Author);
         $stmt->bindParam(':Platform', $Platform);
         $stmt->bindParam(':id', $id);

         if($stmt->execute()){
             echo "<div>Record was updated.</div>";
         }else{
             echo "<div>Unable to update record. Please try again.</div>";
         }
  
     }
  
     catch(PDOException $exception){
         die('ERROR: ' . $exception->getMessage());
     }
 }
 ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table>
        <!-- hier kan je bepalen wat je verandert -->
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value="<?php echo htmlspecialchars($name, ENT_QUOTES);  ?>" class='form' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form'><?php echo htmlspecialchars($description, ENT_QUOTES);  ?></textarea></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='text' name='price' value="<?php echo htmlspecialchars($price, ENT_QUOTES);  ?>" class='form' /></td>
        </tr>

        
        <tr>
            <td>Author</td>
            <td><input type='text' name='Author' value="<?php echo htmlspecialchars($Auhtor, ENT_QUOTES);  ?>" class='form' /></td>
        </tr>

        <tr>
            <td>Platform</td>
            <td><input type='text' name='Platform' value="<?php echo htmlspecialchars($Platform, ENT_QUOTES);  ?>" class='form' /></td>
        </tr>


        <tr>
            <td></td>
            <td>
                <input type='submit' value='Opslaan' class='button' />
                <a href='edit.php' class='button' id="btn_red">Terug</a>
            </td>
        </tr>
    </table>
</form>
 
</div>

<footer>
    <p>Cooperative of Collectors and Preservers - © 2021</p>
</footer>

<!--js voor nav en slideshow-->
<script src="../misc.js"></script>

</body>
</html>