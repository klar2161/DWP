<?php
require_once ("includes/dbh.inc.php");
require_once ("includes/functions.inc.php");
$username = $_POST['username'];
$email = $_POST['email'];
$hashedPwd_salt = $_POST['password'];
$hashedPwd = password_hash($hashedPwd_salt, PASSWORD_DEFAULT);
$hashedPwd_salt = password_hash($hashedPwd_salt, PASSWORD_DEFAULT,array('cost' =>9));


$query = "INSERT INTO `Users` (`userID`, `usersUid`, `usersEmail`, `usersPWD`)
 VALUES (NULL, '$username', '$email', '$hashedPwd_salt')";

if(!mysqli_query($conn, $query)){
    die("DB ERROR BRUH:". mysqli_error($conn));
}