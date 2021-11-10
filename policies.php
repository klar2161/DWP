<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/functions.inc.php';

$sql = "SELECT policies FROM Platform"; 
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($resultData);

?>


<body>
    <p style="font-size:20px;margin:40px;"><?php 
     echo $row['policies'];
     ?>
    </p>
</body>
</html>