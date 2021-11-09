<?php

include_once 'header.php';

if (isset($_SESSION["useruid"])) {
    echo "" . $_SESSION["useruid"] . "";
} 

?>

<div class="postcontainer">
<form action="includes/feed.inc.php" method="post" class="postbox">
        <input type="text" name="post" placeholder="What's in your head?">
        <button type="submit" name="submit" class="postbox">Post</button>
</form>
</div>

<?php

require_once("includes/dbh.inc.php");

$conn= conn();

$query = "SELECT*FROM `Posts`";
$result = mysqli_query($conn, $query) or die("its ded");
while($row = mysqli_fetch_array($result)){
    echo  
    $row["post"].
    "<a href='deletepost.php?id=".$row['postID']."'>  X</a><br>";
     
} 
  

?>

<section class="index-intro">


<?php

include_once 'footer.php';

?>

