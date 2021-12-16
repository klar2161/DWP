<?php
ob_start();

include_once '../Presentation/header.php';
include_once '../DataAcces/connectDB.php';
include_once 'uploader.php';
include_once '../DataAcces/userDAO.php';


//upload for profile
if (isset($_POST['submit'])) {
    $userid = $_SESSION['userid'];
    $file = $_FILES['image'];
    $uploader = new Uploader();
    $filepath = $uploader->uploadImage($file,"800");

    $userDB = new userDAO();
    $userDB->changeCoverImg($filepath,$userid);

    header("location: ../Presentation/profile.php");
}

