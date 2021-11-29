<?php

include_once("../DataAcces/connectDB.php");
include_once("../DataAcces/postDAO.php");
include_once("uploader.php");
include('session.php');
    

if (isset($_POST['postcontent'])) {

    $post = $_POST['postcontent'];
    $image = $_FILES['image'];

    $uploader = new Uploader();
    $filePath  = $uploader->uploadImage($image, "400");

    $feedDB = new PostDAO();
    $filePath  = $feedDB->createPost($conn, $post, $userid, $filePath);

    header("location: ../Presentation/feed.php");
}
else {
    header("location: ../Presentation/feed.php");
    exit();
}

