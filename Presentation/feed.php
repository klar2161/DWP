<?php

include_once 'header.php';
include_once '../DataAcces/connectDB.php';
include_once '../DataAcces/postDAO.php';


?>
 
<div class="postcontainer">
    <form action="../Application/feed.inc.php" method="post" class="postbox" enctype="multipart/form-data">
            <textarea type="text" name="postcontent"  rows="7" cols="64" style="" placeholder="What's in your head?" required></textarea>
            <input type="file" name="image">
            <br>
            <button type="submit" name="submit" class="postbox">Post</button>
    </form>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.livequery.js"></script>
<script src="js/jquery.tooltipsterReaction.js"></script>
<script src="js/jquery.tipsy.js"></script>
<script src="js/app.js"></script>
</div> 

<?php 
	  $query = 
    "SELECT Posts.postID, users.usersuid, Posts.post, Posts.userID,Posts.post_img
    FROM Posts
    JOIN users ON Posts.userID=users.userID
    ORDER BY postID DESC";
    $result = mysqli_query($conn, $query) or die("its ded");
    
    /*$postDAO = new PostDAO(); //create object from class
    $row = $postDAO->getSpecificPost();*/

    while($row = mysqli_fetch_assoc($result)){
        $postid=$row['postID'];
        echo    
        "<h1>".$row["usersuid"]."</h1>".
        "<a href='../Application/deletepost.php?id=".$row['postID']."'>  X</a>
        <br>".
        "<h2>".$row['post']."</h2>"."<br>".
        "<img src=".$row['post_img'].">".
        "<br>".
        "<a href='../Application/updatepost.php?id=".$row['postID']."'>Edit</a>".
        "<br>".
        "<a href='../Presentation/post.php?id=".$row['postID']."'>Checkout this post</a>".
        "<br>";

        include 'reactions.php';      
?>
    <form action="../Application/comment.php" method="post" class="postbox">
        <textarea type="text" name="content" id="content" rows="2" cols="64" style="" placeholder="Comment"></textarea>
        <input type="hidden" name="uid" value="<?php echo $row["userID"]; ?>">
        <input type="hidden" name="postID" value="<?php echo $row["postID"]; ?>">
        <br>
        <button type="submit" name="submit">Comment</button>
    </form>
<?php 
  $postid=$row['postID'];
  $comment_query = "SELECT content FROM comments 
          WHERE comments.postID = '$postid'";
          $result2 = mysqli_query($conn, $comment_query) or die("its ded");
          while($row2 = mysqli_fetch_assoc($result2)){
            echo  "<h2>".$row2["content"]."</h2>";
          }
          
  }
?>

<section class="index-intro">




<img src="<?php
  echo $row["post_img"];
  ?>" alt="" >



<?php

include_once 'footer.php';

?>





