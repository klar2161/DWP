<?php
include_once '../Presentation/feed.php';
include_once '../DataAcces/postDAO.php';
include_once 'session.php';
header("Refresh:0; url=../Presentation/feed.php");



if(isset($_GET['id'])){
    $query = "DELETE FROM `posts` WHERE `postID`=". $_GET['id'];
    mysqli_query($conn, $query);
    

}