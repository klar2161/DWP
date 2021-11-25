<?php

include_once 'header.php';
include_once '../DataAcces/connectDB.php';
include_once '../Application/functions.inc.php';




$sql = "SELECT * FROM Platform"; 
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($resultData);





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