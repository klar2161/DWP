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

    function getSpecificComment(){
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        $sql = "SELECT*FROM comments"; 
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($resultData);

        mysqli_stmt_close($stmt);

        return $row;

    }

    function getAllPosts(){
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        $sql = 
        "SELECT Posts.postID, users.usersuid, Posts.post, Posts.userID,Posts.post_img
        FROM Posts
        JOIN users ON Posts.userID=users.userID
        ORDER BY postID DESC";

        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($resultData);

        mysqli_stmt_close($stmt);

        return $row;

    }

    function pinnSwitcher($postID,$pinnAction){
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();
        $pinnActionBool= $pinnAction?1:0;

        $sql = "UPDATE posts SET is_pinned=? WHERE postID=?;";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        
        mysqli_stmt_bind_param($stmt, "ii", $pinnActionBool, $postID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    function updatePost($conn,$post,$id) {
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        $sql = "UPDATE posts SET post = ? WHERE postID = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
           header("location: ../Presentation/feed.php");
           exit();
       }
        mysqli_stmt_bind_param($stmt, "si", $post,$id);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
        
    }
    }