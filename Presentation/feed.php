<?php

include_once 'header.php';

?>

<div class="postcontainer">
    <form action="includes/feed.inc.php" method="post" class="postbox">
            <textarea type="text" name="post"  rows="7" cols="64" style="" placeholder="What's in your head?" required></textarea>
            <br>
            <button type="submit" name="submit" class="postbox">Post</button>
    </form>
</div>

<?php

include_once("../DataAcces/connectDB.php");

$query = "SELECT Posts.postID, users.usersuid, Posts.post, Posts.userID
FROM Posts
INNER JOIN users ON Posts.userID=users.userID;";
$result = mysqli_query($conn, $query) or die("its ded");
while($row = mysqli_fetch_assoc($result)){
    echo  
    "<h1>".$row["usersuid"]."</h1>"."<a href='deletepost.php?id=".$row['postID']."'>  X</a><br>".
    "<h2>".$row["post"]."</h2>";

    ?><form action="includes/comment.php" method="post" class="postbox">
    <textarea type="text" name="content" id="content" rows="2" cols="64" style="" placeholder="Comment"></textarea>
    <input type="hidden" name="uid" value="<?php echo $row["userID"]; ?>">
    <br>
    <button type="submit" name="submit">Comment</button>
</form><?php
}


?>



<?php
							
?>

<section class="index-intro">


<?php

include_once 'footer.php';

?>





