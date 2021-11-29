<?php
    include_once '../DataAcces/connectDB.php';
    include_once 'functions.inc.php';
    include_once '../DataAcces/userDAO.php';
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
   
    $profileUpdateDB = new UserDAO();
    $profileUpdateDB->updateUser($email,$username,$userid);
    


$_SESSION["useruid"] = $username;
 header("location: ../Presentation/profile.php");
 }
 

