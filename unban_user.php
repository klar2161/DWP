<?php
require_once("usersA.php");
header("Refresh:0; url=adminpanel.php");
if(isset($_GET['id'])){
    $query = "UPDATE `Users` SET user_level='0' WHERE `userID`=". $_GET['id'];
    mysqli_query($conn, $query);
    

}