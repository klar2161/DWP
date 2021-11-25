<?php

include_once("../DataAcces/connectDB.php");
include('session.php');
    

if (isset($_POST['postcontent'])) {

    $post = $_POST['postcontent'];

    createPost($conn, $post, $userid);

    header("location: ../Presentation/feed.php");
}
else {
    header("location: ../Presentation/feed.php");
    exit();
}

function createPost($conn, $post, $userid) {

    $sql = "INSERT INTO posts (post,userID) VALUES ( ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Presentation/feed.php");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "si", $post, $userid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}