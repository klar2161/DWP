<?php
include_once 'connectionFactory.php';

class PlatformDAO{

    function getInfoFromDB(){
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        $sql = "SELECT * FROM Platform"; 
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($resultData);

        mysqli_stmt_close($stmt);

        return $row;

    }

}