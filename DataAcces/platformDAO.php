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
    function updateInfoPlatform($name,$description,$platformid) {
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        $sql = "UPDATE Platform SET Name = ?, Description = ? WHERE platformID =$platformid";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
           header("location: ../Presentation/about-edit.php?error=stmtfailed");
           exit();
       }
        mysqli_stmt_bind_param($stmt, "ssi",$name,$description,$platformid);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
        
    }

}