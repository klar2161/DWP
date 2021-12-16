<?php
ob_start();
session_start();
if (!isset($_SESSION['userid'])){
header('location:feed.php');
}

$userid=$_SESSION['userid'];
$member_query = mysqli_query($conn,"select * from users where userid = '$userid'")or die(mysqli_error());
$member_row = mysqli_fetch_array($member_query);
?>