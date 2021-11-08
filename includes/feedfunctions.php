<?php
function createPost(){
    $serverName = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "DeepbookDB";
    
    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
    
    
    $post = $_POST["post"];
    
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO Posts (postID, post)
    VALUES (NULL,'$post')";
    
    if ($conn->query($sql) === TRUE) {
      header("location: ../index.php");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    }
    
    function deletePost(){

        $postid=$_GET['postid'];

        if (!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }
        
        "DELETE FROM `posts` WHERE postID=".$_GET['postID'];
    
        if ($conn->query($sql) === TRUE) {
            header("location: ../index.php");
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }   

    