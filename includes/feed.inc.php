<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "DeepbookDB";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

include('session.php');

<<<<<<< HEAD
if (isset($_POST['post'])){

    header('feed.php');

    $post = $_POST["post"];
=======
if(isset($_GET['id'])){
    $query = "DELETE FROM `posts` WHERE `postID`=". $_GET['id'];
    mysqli_query($conn, $query);
>>>>>>> 3d6f73df0e2a8fcf473ffb3748c40a86a8941cd8
    

mysqli_query($conn,"insert into posts (post,userID) values ('$post','$userid') ")or die(mysqli_error());
};