<?php
include_once 'usersA.php';
header("Refresh:0; url=../Presentation/adminpanel.php");
if(isset($_GET['id'])){
    $query = "DELETE FROM `Users` WHERE `userID`=". $_GET['id'];
    mysqli_query($conn, $query);
    

}