<?php

include_once 'header.php';
include_once '../DataAcces/connectDB.php';

?>

<div class="postcontainer">
    <form action="../Application/feed.inc.php" method="post" class="postbox">
            <textarea type="text" name="postcontent"  rows="7" cols="64" style="" placeholder="What's in your head?" required></textarea>
            <br>
            <button type="submit" name="submit" class="postbox">Post</button>
    </form>
</div>

<?php
	$query = "SELECT Posts.postID, users.usersuid, Posts.post, Posts.userID, comments.content
    FROM Posts
    JOIN users ON Posts.userID=users.userID
    JOIN comments ON Posts.userID=comments.userID";
    $result = mysqli_query($conn, $query) or die("its ded");
    while($row = mysqli_fetch_assoc($result)){
        echo  
        "<h1>".$row["usersuid"]."</h1>".
        "<a href='../Application/deletepost.php?id=".$row['postID']."'>  X</a>
        <br>".
        "<h2>".$row['post']."</h2>"."<br>".
        "<h2>".$row['content']."</h2>";

        ?><form action="../Application/comment.php" method="post" class="postbox">
        <textarea type="text" name="content" id="content" rows="2" cols="64" style="" placeholder="Comment"></textarea>
        <input type="hidden" name="uid" value="<?php echo $row["userID"]; ?>">
        <input type="hidden" name="postID" value="<?php echo $row["postID"]; ?>">
        <br>
        <button type="submit" name="submit">Comment</button>
    </form><?php
    }
?>

<section class="index-intro">


<?php

include_once 'footer.php';

?>





