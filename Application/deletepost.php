<?php
ob_start();
include_once '../Presentation/feed.php';
include_once '../DataAcces/postDAO.php';
header("Refresh:0; url=../Presentation/feed.php");


if(isset($_GET['id'])){
    $deleteReactionsQuery = "DELETE FROM `post_like` WHERE `postID_fk`=". $_GET['id'];
    mysqli_query($conn, $deleteReactionsQuery);

    $deleteCommentsQuery = "DELETE FROM `comments` WHERE `postID`=". $_GET['id'];
    mysqli_query($conn, $deleteCommentsQuery);

    $deletePostQuery = "DELETE FROM `posts` WHERE `postID`=". $_GET['id'];
    mysqli_query($conn, $deletePostQuery);
}

