<?php
ob_start();
include_once 'connectionFactory.php';


class ReactionDAO {

    function getLikesForPost($postid){
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        $sql = "SELECT COUNT(*) AS likecount FROM post_like WHERE postID=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../Presentation/feed.php");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $postid);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($resultData);

        mysqli_stmt_close($stmt);

        return $row;
        
    }

    function didUserLikePost($postid,$userid){
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();
      
        $sql = "SELECT COUNT(*)AS did_like FROM post_like WHERE postID=? AND userID=?"; 
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $postid,$userid);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($resultData);

        mysqli_stmt_close($stmt);

        return $row['did_like']>0;
    }

    function likePost($postid,$userid){
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        $sql = "INSERT INTO post_like (userID,postID) VALUES ( ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../Presentation/feed.php");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ii",$userid,$postid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    function removeLike($postid,$userid){
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        $sql = "DELETE FROM post_like WHERE userID=? AND postID=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../Presentation/feed.php");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ii",$userid,$postid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}