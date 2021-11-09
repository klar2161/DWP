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
      header("location: ../feed.php");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    }

    
    
    /*function deletePost(){

      require_once("includes/dbh.inc.php");
        $result = mysqli_query($conn, $query) or die("unlucky");
        while($row = mysqli_fetch_array($result)){
            echo 
            "<a href='del_user.php?id=".$row['userID']."'>delete</a><br>"; 
          }
    }
    
    }   */

    