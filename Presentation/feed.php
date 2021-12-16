<?php

include_once 'header.php';
include_once '../DataAcces/connectDB.php';
include_once '../DataAcces/postDAO.php';
include_once '../Application/functions.inc.php';
include_once '../Application/postPinnSwitcher.php';
include_once '../Application/banned.php';



?>
 
<div class="postcontainer">
    <form action="../Application/feed.inc.php" method="post" class="postbox" enctype="multipart/form-data">
            <textarea type="text" name="postcontent"  rows="7" cols="64" style="" placeholder="What's in your head?" required></textarea>
            <input type="file" name="image">
            <br>
            <button type="submit" name="submit" class="postbox">Post</button>
    </form>

</div> 

<?php 

    $postDAO = new PostDAO();
    $result = $postDAO->getAllPosts();

    while($row = mysqli_fetch_assoc($result)){
        $postid=$row['postID'];
           
        echo "<h1>".$row["usersuid"]."</h1>";
         if (isAdmin()) {
          if (boolval($row["is_pinned"])==true) {
            echo "<a href='../Application/postPinnSwitcher.php?postID=".$row['postID']."&pinnAction=false' name='unpinn'>Unpinn this post</a>";
          }else{
          echo "<a href='../Application/postPinnSwitcher.php?postID=".$row['postID']."&pinnAction=true' name='pinn'>Pinn this post</a>";
          }
          echo "<br>";
        }

        if (boolval($row["is_pinned"])==true) {
          echo "<h3 style='color:green';>This post is pinned</h3>";
        } 

        echo "<a href='../Application/deletepost.php?id=".$row['postID']."'>  X</a>
        <br>";
        echo "<h2>".$row['post']."</h2>"."<br>";
        echo "<img src=".$row['post_img'].">".
        "<br>";
        echo"<a href='../Application/updatepost.php?id=".$row['postID']."'>Edit</a>".
        "<br>";
        echo"<a href='../Presentation/post.php?id=".$row['postID']."'>Checkout this post</a>".
        "<br>";

        
        include 'test.php';      
        
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
          $commentresult = mysqli_query($conn, $comment_query) or die("its ded");
          while($commentrow = mysqli_fetch_assoc($commentresult)){
            echo  "<h2>".$commentrow["content"]."</h2>";
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





