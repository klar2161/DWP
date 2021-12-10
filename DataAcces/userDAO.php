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

    function getSpecificEditUser($userId) {
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();
        
        $sql = "SELECT * FROM users WHERE userID = $userId";
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
    function updateUser($email,$username,$userid) {
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        $sql = "UPDATE users SET usersEmail = ?, usersUid = ? WHERE userID = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
           header("location: ../Presentation/profile-edit.php?error=stmtfailed");
           exit();
       }
        mysqli_stmt_bind_param($stmt, "ssi", $email,$username,$userid);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
        
    }



    function createUser($conn, $email, $username, $pwd) {
    
        $sql = "INSERT INTO users (usersEmail, usersUid, usersPwd) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../Presentation/signup.php?error=stmtfailed");
            exit();
        }
    
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $hashedPwd_salt = password_hash($pwd, PASSWORD_DEFAULT,array('cost' =>9));
    
    
        mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedPwd_salt);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../Presentation/signup.php?error=none");
            exit();
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

    function unbanUser($userid){
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        $query = "UPDATE `Users` SET user_level='0' WHERE 
        `userID`=". $_GET['id'];
        mysqli_query($conn, $query);
    }

    function banUser($userId){
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        $query = "UPDATE `Users` SET user_level='2' WHERE 
        `userID`=". $_GET['id'];
        mysqli_query($conn, $query);
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
    function changeCoverImg($filepath,$userid){
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        // save to db
        $sql = "UPDATE users SET cover_img = ? WHERE userID = ?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "si", $filepath,$userid);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
    }

    function updateUserAdmin($username,$email) {
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        $sql = "UPDATE users SET `usersUid` = ?, `usersEmail` = ? WHERE `userID` = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../Presentation/adminpanel.php");
           exit();
       }
        mysqli_stmt_bind_param($stmt, "ssi",$username,$email,$_GET['id']);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
        
    }

    

    
}




