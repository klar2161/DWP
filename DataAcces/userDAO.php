<?php
include_once 'connectDB.php';

class UserDAO {

    function getSpecificUser($userId) {
        $serverName = "localhost";
        $dBUsername = "root";
        $dBPassword = "";
        $dBName = "DeepbookDB";

        $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

        
        $sql = "SELECT * FROM users WHERE userID = ?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($resultData);

        mysqli_stmt_close($stmt);

        return $row;
    }

    // user wide
    function updateUser($userid) {

        
    }



    function createUser() {
    }


    // used by an admin
    function deleteUser($userId) { 
    }

}

?>



