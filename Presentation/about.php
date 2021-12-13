<?php
include_once 'header.php';
include_once '../DataAcces/connectDB.php';
include_once '../Application/functions.inc.php';
include_once '../Application/banned.php';
include_once '../DataAcces/platformDAO.php';



$platformDAO = new PlatformDAO(); //create object from class
$row = $platformDAO->getInfoFromDB();

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
   
 </head>
 <body>
     <h1><?php 
     echo $row['Name'];
     ?></h1>
     <br></br>
     <p>
     <?php 
     echo $row['Description'];
     ?>
     </p>
    <br></br>
    <br></br>

    <?php if(isAdmin()) {
    echo "<a href='about-edit.php'>";
    echo "<button type='submit' name='submit'>EDIT</button>";
    echo "</a>";
    }
  ?>
  <br></br>
     <a href="../DataAcces/policies.php">Rules and Regulations</a>
 </body>
 </html>