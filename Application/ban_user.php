<?php
include_once 'usersA.php';
include_once '../DataAcces/userDAO.php';
header("Refresh:0; url=../Presentation/adminpanel.php");
if(isset($_GET['id'])){
    $userid = $_GET['id'];

    $userDB = new userDAO();
    $userDB->banUser($userid);
}