<?php

include_once 'header.php';
include_once '../DataAcces/connectDB.php';
include_once '../Application/functions.inc.php';


if (isset($_SESSION["useruid"])) {
    echo "<h1 style='color:white'>Welcome here " . $_SESSION["useruid"] . "</h1>";
} 





include_once 'footer.php';
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
   
 </head>
 <body style="background-color:black;">
 <div class="wrapper">
        <a href="index.php"><img src="../Presentation/img/logo2.png" alt="Logo" class="logo-big" style=" display: block;
    margin-left: auto;
    margin-right: auto; "></a>
</div>
 </body>
 </html>