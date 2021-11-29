<?php
    include_once '../DataAcces/connectDB.php';
    
	$query = "SELECT Posts.postID, users.usersuid, Posts.post, Posts.userID,Posts.post_img
    FROM Posts
    JOIN users ON Posts.userID=users.userID
    WHERE posts.postID= 4";
    $result = mysqli_query($conn, $query) or die("its ded");
    while($row = mysqli_fetch_assoc($result)){
        echo  
        "<h1>".$row["postID"]."</h1>".
        "<h1>".$row["usersuid"]."</h1>".
        "<a href='../Application/deletepost.php?id=".$row['postID']."'>  X</a>
        <br>".
        "<h2>".$row['post']."</h2>"."<br>".
        "<img src=".$row['post_img'].">";

        ?>
        <form action="../Application/comment.php" method="post" class="postbox">
        <textarea type="text" name="content" id="content" rows="2" cols="64" style="" placeholder="Comment"></textarea>
        <input type="hidden" name="uid" value="<?php echo $row["userID"]; ?>">
        <input type="hidden" name="postID" value="<?php echo $row["postID"]; ?>">
        <br>
        <button type="submit" name="submit">Comment</button>
    </form><?php

    include 'reactions.php';
    }
?>