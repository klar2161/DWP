<?php
ob_start();
include_once("../DataAcces/connectDB.php");
include_once("../DataAcces/postDAO.php");
include('session.php');

if (isset($_POST['content'])) {

    $content = $_POST["content"];
    $userid = $_POST["uid"];
    $postID = $_POST["postID"];
    
    $commentDB = new PostDAO();
    $commentDB->createComment($conn, $content, $userid, $postID);

    header("location: ../Presentation/feed.php");

}
else {
    header("location:   ../Presentation/feed.php");
    exit();
}


