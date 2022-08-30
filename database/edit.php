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
    <title>CCP OFFICIAL - EDIT</title>
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
 
<h1>Games Edit</h1>
 
<?php
    echo "<div class='middle'><a href='database.php' class='button'>Home</a> <a href='create.php' class='button' id='btn_green'>Create New Product</a></div>";
        
    include 'database2.php';
    
    $action = isset($_GET['action']) ? $_GET['action'] : "";
    
    // selecteer alle data
    $query = "SELECT id, name, description, price, Author, Platform FROM products ORDER BY id DESC";
    $stmt = $con->prepare($query);
    $stmt->execute();
    

    $num = $stmt->rowCount();

    if($num>0){
    
    //Tafel begin
    echo "<table>";
    
    //Maak de tafel header
    echo "<tr>
        <th>Name</th>
        <th>Genre</th>
        <th>Release</th>
        <th>Author</th>
        <th>Platform</th>
        <th>Action</th>
    </tr>";

    // Content van de database naar de tafel
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
    
        echo "<tr>

            <td>{$name}</td>
            <td>{$description}</td>
            <td>{$price}</td>
            <td>{$Author}</td>
            <td>{$Platform}</td>
            <td>";
                         
                echo "<a href='update.php?id={$id}' class='button' id='btn_yello'>Update</a>";
    
                
                echo "<a href='#' onclick='delete_user({$id});'  class='button' id='btn_red'>Delete</a>";
            echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
    
    }
?>
    
    </div> 
    
    <script type='text/javascript'>
    function delete_user( id ){
    
     let answer = confirm('Are you sure?');
     if (answer){
         window.location = 'delete.php?id=' + id;
    }
 }
</script>

<footer>
    <p>Cooperative of Collectors and Preservers - © 2021</p>
</footer>

<!--js voor nav en slideshow-->
<script src="../misc.js"></script>
 
</body>
</html>