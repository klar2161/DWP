<?php
include_once("../DataAcces/connectDB.php");
include('session.php');

if (isset($_POST['content'])) {

    $content = $_POST["content"];
    $userid = $_POST["uid"];
    $postID = $_POST["postID"];
    
    createComment($conn, $content, $userid, $postID);
    

    header("location: ../Presentation/feed.php");

}
else {
    header("location:   ../Presentation/feed.php");
    exit();
}



function createComment($conn, $content, $userid, $postID) {
    
    $sql = "INSERT INTO `Comments` (`commentID`, `content`, `userID`, `postID`) VALUES (NULL, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Presentation/feed.php");
        
        exit();
    }
    var_dump($stmt);
    mysqli_stmt_bind_param($stmt, "sii", $content, $userid, $postID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

