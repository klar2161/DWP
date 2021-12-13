<?php

include_once 'header.php';
include_once '../DataAcces/connectDB.php';
include_once '../DataAcces/postDAO.php';


?>

<?php

    $postid = $_GET['id']; 
    
    $qry = "SELECT posts.postID, users.usersuid, posts.post, posts.userID,posts.post_img
    FROM posts
    JOIN users ON posts.userID=users.userID WHERE postid='$postid'";
     

    $result = mysqli_query($conn, $qry) or die("its ded");
    
    while($row = mysqli_fetch_assoc($result)){
        $postid=$row['postID'];
          echo    
          "<h1>".$row["usersuid"]."</h1>".
          "<br>".
          "<h2>".$row['post']."</h2>"."<br>".
          "<img src=".$row['post_img'].">".
          "</a>";

          $comment_query = "SELECT content FROM comments 
          WHERE comments.postID = '$postid'";
          $comment_result = mysqli_query($conn, $comment_query) or die("its ded");
          while($comment_row = mysqli_fetch_assoc($comment_result)){
            echo  "<h2>".$comment_row["content"]."</h2>";
          }
        }
?>

<?php

include_once 'footer.php';

?>
