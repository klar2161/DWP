<?php

include_once 'header.php';
include_once '../DataAcces/connectDB.php';
include_once '../DataAcces/postDAO.php';


?>

<?php

    $postid = $_GET['id']; 
    
    $qry = "SELECT Posts.postID, users.usersuid, Posts.post, Posts.userID,Posts.post_img
    FROM Posts
    JOIN users ON Posts.userID=users.userID WHERE postid='$postid'";
     

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
          $result = mysqli_query($conn, $comment_query) or die("its ded");
          while($row = mysqli_fetch_assoc($result)){
            echo  "<h2>".$row["content"]."</h2>";
          }
        }
?>

<?php

include_once 'footer.php';

?>
