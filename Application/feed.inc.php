<?php

include_once("../DataAcces/connectDB.php");
include('session.php');

/*if (isset($_POST['post'])){

    header("location: ../feed.php");

    $post = $_POST["post"];

mysqli_query($conn,"insert into posts (post,userID) values ('$post','$userid') ")or die(mysqli_error());
}*/
    

if (isset($_POST['post'])) {

    $post = $_POST["post"];

    createPost($conn, $post, $userid);

    header("location: ../feed.php");
}
else {
    header("location: ../feed.php");
    exit();
}

function createPost($conn, $post, $userid) {

    $sql = "INSERT INTO posts (post,userID) VALUES ( ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../feed.php");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "si", $content, $userid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}