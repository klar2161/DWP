<?php
ob_start();
include_once '../DataAcces/userDAO.php';
// SIGNUP Functions --------------------------------
function emptyInputSignup($email, $username, $pwd, $pwdRepeat) {
    $results;
    if (empty($email) or empty($username) or empty($pwd) or empty($pwdRepeat)) {
        $results = true;
    }
    else {
        $results = false;
    }
    return $results;
    
}

function invalidUid($username) {
    $results;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $results = true;
    }
    else {
        $results = false;
    }
    return $results;
    
}

function invalidEmail($email) {
    $results;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $results = true;
    }
    else {
        $results = false;
    }
    return $results;
    
}

function pwdMatch($pwd, $pwdRepeat) {
    $results;
    if ($pwd !== $pwdRepeat) {
        $results = true;
    }
    else {
        $results = false;
    }
    return $results;
    
}

function uidExists($conn, $username) {
    
    $sql = "SELECT * FROM users WHERE usersUid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Presentation/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        return false;
    }

    mysqli_stmt_close($stmt);
}
function emailExists($conn, $email) {
    
    $sql = "SELECT * FROM users WHERE usersEmail = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Presentation/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        return false;
    }

    mysqli_stmt_close($stmt);
}




// LOGIN Functions --------------------------------


function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username)  or empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
    
}
// i used switch just because i dont want use 100 elseifs:))
function errorHandlers($error){
    switch ($error){
        case "invalidemail":
            echo "<p>Choose a proper email!</p>";
            break;
        case "emptyinput":
                echo "<p>Fill in all fields!</p>";
                break;
        case "usernametaken":
                echo "<p>Choose another username!!</p>";
                break;
        case "stmtfailed":
                echo "<p>Something went wrong! Try again :(!</p>";
                break;
    }
}

function loginUser($conn, $username, $pwd) {

    $uidExists = uidExists($conn, $username);
    //var_dump($uidExists);

    if ($uidExists == false) {
        header("location: ../Presentation/login.php?error=wronglogin");
        exit();
    }

    $pwdHashed_salt = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed_salt);

    if ($checkPwd === false) {
        header("location: ../Presentation/login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true){   
        session_start();
        $_SESSION["userid"] = $uidExists["userID"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["user_level"] = $uidExists["user_level"];
        $_SESSION["isLoggedIn"] = true;
        
        
        //$_SESSION["useremail"] = $uidExists["usersEmail"];
 
        header("location: ../Presentation/feed.php");
        exit();
    }
}

define('USER_LEVEL_ADMIN' , '1');



function isAdmin() {
    if ( isset( $_SESSION['useruid'] ) && $_SESSION['user_level'] == 1 ) {
        return true;
    } else {
        return false;
    }
}

