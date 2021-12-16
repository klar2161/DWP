<?php
ob_start();
include_once '../DataAcces/postDAO.php';


if(isset($_GET['postID'])&&(isset($_GET['pinnAction']))){
    $postID = $_GET['postID'];
    $pinnAction = filter_var($_GET['pinnAction'], FILTER_VALIDATE_BOOLEAN);
    
    $postDB = new postDAO();
    $postDB->pinnSwitcher($postID,$pinnAction);

    header("Refresh:0; url=../Presentation/feed.php");
    
}