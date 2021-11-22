<?php
include_once("dbh.inc.php");
include('session.php');

/*if (isset($_POST['content'])){

    $content = $_POST["content"];

mysqli_query($conn,"insert into comments (content,userID) values ('$content','$userid') ")or die(mysqli_error());*/

if (isset($_POST['content'])) {

    $content = $_POST["content"];

    createComment($conn, $commentID, $content, $userid);

}
else {
    header("location: ../feed.php");
    exit();
}


function createComment($conn, $commentID, $content, $userid) {

    header("location: ../feed.php");
    
    $sql = "INSERT INTO comments (commentID, content, userID) VALUES (NULL, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../feed.php");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "isi", $commentID, $content, $userid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

