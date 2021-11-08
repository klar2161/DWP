<div class="postcontainer">
<form action="includes/feed.inc.php" method="post" class="postbox">
        <input type="text" name="post" placeholder="What's in your head?">
        <button type="submit" name="submit" class="postbox">Post</button>
</form>
</div>

<?php
require_once("includes/dbh.inc.php");
$query = "SELECT*FROM `Posts`";
$result = mysqli_query($conn, $query) or die("its ded");
while($row = mysqli_fetch_array($result)){
    echo 
    $row['post']. "X</a> <br>"; 
     
}   

?>


