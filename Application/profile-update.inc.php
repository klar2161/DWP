<?php
    include_once '../DataAcces/connectDB.php';
    include_once 'functions.inc.php';
session_start();

if (isset($_POST["submit"])) {
    $username = $_POST["uid"];
    $email = $_POST["email"];

    $userid = $_SESSION["userid"];

    // TODO check if empty, add updated to session
    if (empty($username)  or empty($email)) {
        header("location: ../Presentation/profile-edit.php?error=emptyinput");
        exit();
    }
    if (invalidEmail($email)) {
        header("location: ../Presentation/profile-edit.php?error=invalidemail");
        exit();
    }
    if (uidExists($conn, $username)){
        header("location: ../Presentation/profile-edit.php?error=usernametaken");
        exit();
    }
    if (emailExists($conn, $email)){
        header("location: ../Presentation/profile-edit.php?error=usernametaken");
        exit();
    }
   
    
    
 $sql = "UPDATE users SET usersEmail = ?, usersUid = ? WHERE userID = ?";
 $stmt = mysqli_stmt_init($conn);
 if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../Presentation/profile-edit.php?error=stmtfailed");
    exit();
}
 mysqli_stmt_bind_param($stmt, "ssi", $email,$username,$userid);
 mysqli_stmt_execute($stmt);
 
 mysqli_stmt_close($stmt);

$_SESSION["useruid"] = $username;
 header("location: ../Presentation/profile.php");
 }
 

