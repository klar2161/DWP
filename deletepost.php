<?php
require_once("feed.php");
header("Refresh:0; url=feed.php");
if(isset($_GET['id'])){
    $query = "DELETE FROM `posts` WHERE `postID`=". $_GET['id'];
    mysqli_query($conn, $query);
    

}