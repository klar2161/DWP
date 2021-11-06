<?php
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

function uidExists($conn, $username, $email) {
    
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $username, $pwd) {
    
    $sql = "INSERT INTO users (usersEmail, usersUid, usersPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
        exit();
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

function loginUser($conn, $username, $pwd) {

    $uidExists = uidExists($conn, $username, $username, $email);
    

    if ($uidExists == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["userID"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["useremail"] = $uidExists["usersEmail"];
 
        header("location: ../index.php");
        exit();
    }
}