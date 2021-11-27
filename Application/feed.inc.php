<?php

include_once("../DataAcces/connectDB.php");
include_once("uploader.php");
include('session.php');
    

if (isset($_POST['postcontent'])) {

    $post = $_POST['postcontent'];
    $image = $_FILES['image'];

    $uploader = new Uploader();
    $filePath  = $uploader->uploadImage($image, "400");

    createPost($conn, $post, $userid, $filePath);

    header("location: ../Presentation/feed.php");
}
else {
    header("location: ../Presentation/feed.php");
    exit();
}

function createPost($conn, $post, $userid, $filePath) {

    $sql = "INSERT INTO posts (post,userID, post_img) VALUES ( ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Presentation/feed.php");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sis", $post, $userid, $filePath);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}