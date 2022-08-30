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
    <title>CCP OFFICIAL - READ</title>
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
            <h1>Game Info</h1>
        </div>
 
        <?php

$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

include 'database2.php';

try {
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
 
        <!--we have our html table here where the record will be displayed-->
<table>
    <tr>
        <td>Name</td>
        <td><?php echo htmlspecialchars($name, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Genre</td>
        <td><?php echo htmlspecialchars($description, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Release</td>
        <td><?php echo htmlspecialchars($price, ENT_QUOTES);  ?></td>
    </tr>

    <tr>
        <td>Author</td>
        <td><?php echo htmlspecialchars($Author, ENT_QUOTES);  ?></td>
    </tr>

    <tr>
        <td>Platform</td>
        <td><?php echo htmlspecialchars($Platform, ENT_QUOTES);  ?></td>
    </tr>


    <tr>
        <td></td>
        <td>
            <a href='database.php' class='button' id="btn_red">Terug</a>
        </td>
    </tr>
</table>
 
</div>

 

<footer>
    <p>Cooperative of Collectors and Preservers - © 2021</p>
</footer>


<script src="../misc.js"></script>

</body>