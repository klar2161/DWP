<?php

if (isset($_POST["submit"])) {

    $post = $_POST["post"];

    require_once 'dbh.inc.php';
    require_once 'feedfunctions.php';
    
    createPost();

}
else {
    header("location: ../signup.php");
    exit();
};

if(isset($_GET['id'])){
    $query = "DELETE FROM `posts` WHERE `postID`=". $_GET['id'];
    mysqli_query($conn, $query);
    

}