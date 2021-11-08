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

if (isset($_POST["delete"])) {

    $postID = $_POST["postID"];

    require_once 'dbh.inc.php';
    require_once 'feedfunctions.php';
    
    deletePost();

}