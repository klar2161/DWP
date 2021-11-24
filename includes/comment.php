<?php
include_once("dbh.inc.php");
include('session.php');

if (isset($_POST['content'])) {

    $content = $_POST["content"];
    $userid = $_POST["uid"];
    
    createComment($conn, $content, $userid);

    header("location: ../feed.php");

}
else {
    header("location: ../feed.php");
    exit();
}



function createComment($conn, $content, $userid) {
    
    $sql = "INSERT INTO `Comments` (`commentID`, `content`, `userID`) VALUES (NULL, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../feed.php");
        
        exit();
    }
    var_dump($stmt);
    mysqli_stmt_bind_param($stmt, "si", $content, $userid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

