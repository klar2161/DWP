<?php
include_once 'dbh.inc.php';

class UserDAO {

    function getSpecificUser($userId) {

        $conn = conn();

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
    function updateUser($userId) {
    }



    function createUser() {
    }


    // used by an admin
    function deleteUser($userId) {    
    }

}

?>



