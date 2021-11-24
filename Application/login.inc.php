<?php

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once '../DataAcces/connectDB.php';
    require_once 'functions.inc.php';
    
    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../Presentation/login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);

 }

 else {
    header("location: ../Presentation/login.php");
    exit();
 }