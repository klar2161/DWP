<?php
require_once("includes/dbh.inc.php");
$query = "SELECT*FROM `Users`";
$result = mysqli_query($conn, $query) or die("unlucky");
while($row = mysqli_fetch_array($result)){
    echo 
    $row["userID"]. " - ".
    $row["usersUid"]. " - ". 
    $row["usersEmail"]. " - ". 
    $row["user_level"].
    "<a href='del_user.php?id=".$row['userID']."'>delete</a>"." - ". 
    "<a href='ban_user.php?id=".$row['userID']."'>ban</a>"." - ".
    "<a href='unban_user.php?id=".$row['userID']."'>unban</a><br>";
}
?>

