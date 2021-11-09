<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "DeepbookDB";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

include('session.php');

if (isset($_POST['post'])){

    header('feed.php');

    $post = $_POST["post"];
    

mysqli_query($conn,"insert into posts (post,userID) values ('$post','$userid') ")or die(mysqli_error());
};