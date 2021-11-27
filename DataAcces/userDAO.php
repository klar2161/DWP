<?php
include_once 'connectionFactory.php';

class UserDAO {

    function getSpecificUser($userId) {
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        
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
    function deleteUser($userid) {
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();    

        $sql = "DELETE FROM users WHERE userID =?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "i", $userid);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
    }


    function changeProfileImg($filepath,$userid){
                    $dbFactory = new connectionFactory();
                    $conn = $dbFactory->createConnection();

                    // save to db
                    $sql = "UPDATE users SET profile_img = ? WHERE userID = ?";
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_bind_param($stmt, "si", $filepath,$userid);
                    mysqli_stmt_execute($stmt);
                    
                    mysqli_stmt_close($stmt);
    }
}



