<?php
    include_once '../DataAcces/connectDB.php';
    include_once 'functions.inc.php';
    include_once '../DataAcces/platformDAO.php';


if (isset($_POST["submit"])) {
    $name = $_POST["Name"];
    $description = $_POST["Description"];
    $platformid = $_POST["PlatformID"];

    // TODO check if empty, add updated to session
    if (empty($name)  or empty($description)) {
        header("location: ../Presentation/about-edit.php?error=emptyinput");
        exit();
    }
    
   
    $UpdateDB = new PlatformDAO();
    $UpdateDB->updateInfoPlatform($name,$description,(int)$platformid);
    
    header("location: ../Presentation/about.php");
 }
 