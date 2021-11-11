<?php
include_once("dbh.inc.php");
include('session.php');

if (isset($_POST['comment'])){

    header("location: ../feed.php");

    $content = $_POST["content"];
    

    mysqli_query($conn,"INSERT INTO comments (content) VALUES ('ez egy komment te kurva') ")or die(mysqli_error());

}
