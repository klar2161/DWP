<?php
require_once("usersA.php");
if(isset($_GET['id'])){
    $query = "DELETE FROM `Users` WHERE `userID`=". $_GET['id'];
    mysqli_query($conn, $query);
    

}