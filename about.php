<?php

include_once 'header.php';
include_once 'includes/dbh.inc.php';
include_once 'includes/functions.inc.php';
include_once 'banned.php';


$sql = "SELECT * FROM Platform"; 
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($resultData);

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
     <a href="policies.php">Rules and Regulations</a>
 </body>
 </html>