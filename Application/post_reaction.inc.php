<?php

ob_start();
session_start();
include_once '../DataAcces/reactionDAO.php';


if(isset($_GET['postID'])&&(isset($_GET['action']))){
    $postid = $_GET['postID'];
    $action = $_GET['action'];
    $userid = $_SESSION['userid'];
    
    $reactionDB = new reactionDAO();
    if ($action == "like") {
        $reactionDB->likePost($postid,$userid);
    }else if ($action == "cancel_like"){
        $reactionDB->removeLike($postid,$userid);
    }
    

    header("Location: ../Presentation/feed.php");
    
}