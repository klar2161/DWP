<?php
    include_once '../Presentation/header.php';
    include_once '../DataAcces/connectDB.php';
    include_once '../DataAcces/connectionFactory.php';
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

        }
?>

<?php
    $id = $_GET['id'];
     
    $qry = mysqli_query($conn,"SELECT * FROM posts WHERE postid='$id'"); 

    $row = mysqli_fetch_array($qry); 
    
    if(isset($_POST['post'])) 
    {
        $post = $_POST['post'];

        $dbFactory = new postDAO();
        $datapost = $dbFactory->updatePost($conn, $post, $id);
 	

        header("location: ../Presentation/feed.php");
    } 
?>

<h3>Update post</h3>

<form method="post">
  <textarea type="text" name="post"  rows="7" cols="64" style="" placeholder="What's in your head?"  ><?php echo $row["post"]; ?></textarea>
  <input type="submit" name="update" value="Update">
</form>
