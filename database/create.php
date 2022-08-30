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
    <title>CCP OFFICIAL - CREATE</title>
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
 
<div class="container">
 
    <div class="page-header">
        <h1>Create Product</h1>
    </div>
 <!--PHP code-->
<?php

if($_POST){
    include 'database2.php';
 
    try{
        //weer dingen van database pakken :(
        $query = "INSERT INTO products SET  name=:name, description=:description, price=:price, Author=:Author, Platform=:Platform";

        $stmt = $con->prepare($query);

        //Toegoegen aan de database
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

        //Record saven, anders een error
        if($stmt->execute()){
            echo "<div>Record was saved.</div>";
        }else{
            echo "<div>Unable to save record.</div>";
        }
 
    }

    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
 
<!-- HTML form waar je alle info in typt -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form' /></td>
        </tr>
        <tr>
            <td>Genre</td>
            <td><textarea name='description' class='form'></textarea></td>
        </tr>
        <tr>
            <td>Release</td>
            <td><input type='number' name='price' class='form' /></td>
        </tr>

        <tr>
            <td>Author</td>
            <td><input type='text' name='Author' class='form' /></td>
        </tr>

        <tr>
            <td>Platform</td>
            <td><input type='text' name='Platform' class='form' /></td>
        </tr>
        <tr>
            <td>
                <input type='submit' value='Save' class='button'/>
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