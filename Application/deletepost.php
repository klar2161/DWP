<?php
include_once '../Presentation/feed.php';
include_once '../DataAcces/postDAO.php';
header("Refresh:0; url=../Presentation/feed.php");



if(isset($_GET['id'])){
    $deleteCommentsQuery = "DELETE FROM `comments` WHERE `postID`=". $_GET['id'];
    mysqli_query($conn, $deleteCommentsQuery);

    $deletePostQuery = "DELETE FROM `posts` WHERE `postID`=". $_GET['id'];
    mysqli_query($conn, $deletePostQuery);
}

