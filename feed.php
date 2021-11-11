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

require_once("includes/dbh.inc.php");

$conn= conn();

$query = "SELECT posts.postID, users.usersuid, posts.post
FROM posts
INNER JOIN users ON posts.userID=users.userID;";
$result = mysqli_query($conn, $query) or die("its ded");
while($row = mysqli_fetch_array($result)){
    echo  
    "<h1>".$row["usersuid"]."</h1>"."<a href='deletepost.php?id=".$row['postID']."'>  X</a><br>".
    "<h2>".$row["post"]."</h2>";   
}
?>

<form action="includes/comment.php" method="post">
	<textarea type="text" name="comment" rows="2" cols="44" style="" placeholder="Comment" required></textarea><br>
	<button type="submit" name="comment" class="comment">Comment</button>
</form>

<?php 
	/*$query = "SELECT posts.postID, users.usersuid, posts.post
    FROM posts
    INNER JOIN users ON posts.userID=users.userID;";
    $result = mysqli_query($conn, $query) or die("its ded");
    while($row = mysqli_fetch_array($result)){
        echo  
        "<h1>".$row["usersuid"]."</h1>"."<a href='deletepost.php?id=".$row['postID']."'>  X</a><br>".
        "<h2>".$row["post"]."</h2>";   
    }	*/
?>

<section class="index-intro">


<?php

include_once 'footer.php';

?>



