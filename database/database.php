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
    <title>CCP OFFICIAL - OVERZICHT</title>
</head>
<body>


<!-- Maarten code -->
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
            <li><a href="#"><img src="../media/overzicht.png">Overzicht</a></li>
            <li><a href="edit.php"><img src="../media/edit.png">Edit</a></li>
        </ul>
    </nav> 
</aside>
<!-- Vasili Code hieronder -->

 
<h1>Games Overzicht</h1>
 
<?php

    include 'database2.php';
    
    $action = isset($_GET['action']) ? $_GET['action'] : "";
    
    // alle data pakken
    $query = "SELECT id, name, description, price, Author, Platform FROM products ORDER BY id DESC";
    $stmt = $con->prepare($query);
    $stmt->execute();
    
    // hoeveelheid regels terugsturen
    $num = $stmt->rowCount();
    

    if($num>0){
    

    echo "<table>";
    
        //Tafel maken met rows
    echo "<tr>
        <th>Name</th>
        <th>Genre</th>
        <th>Release</th>
        <th>Author</th>
        <th>Platform</th>
        <th>Action</th>
    </tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        //hier plukken van de database
        echo "<tr>
            
            <td>{$name}</td>
            <td>{$description}</td>
            <td>{$price}</td>
            <td>{$Author}</td>
            <td>{$Platform}</td>
            <td>";

            //links naar andere paginas zoals edit.php
                echo "<a href='read_one.php?id={$id}' class='button' id='btn_green'>Read</a>";
                echo "<a href='edit.php' class='button' id='btn_red'>Edit</a>";
                
            echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
    
    }
?>
    
    </div> 
    
    <script type='text/javascript'>
    //hier kan je het deleten met een confirm knop
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


<script src="../misc.js"></script>

</body>
</html>