<?php

include_once("dbh.inc.php");
include('session.php');


if (isset($_POST['post'])){

    header("location: ../feed.php");

    $post = $_POST["post"];

mysqli_query($conn,"insert into posts (post,userID) values ('$post','$userid') ")or die(mysqli_error());

        $sanitized_post = htmlspecialchars($post);
		 $handle->bindParam(':post', $sanitized_post);
}

