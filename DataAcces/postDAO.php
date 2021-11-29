<?php
include_once 'connectionFactory.php';

class PostDAO {

    function createPost($conn, $post, $userid, $filePath) {

        $sql = "INSERT INTO posts (post,userID, post_img) VALUES ( ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../Presentation/feed.php");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sis", $post, $userid, $filePath);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    function createComment($conn, $content, $userid, $postID) {
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();
    
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

  
}