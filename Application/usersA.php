<?php
ob_start();
include_once("../DataAcces/connectDB.php");
include_once ("../DataAcces/userDAO.php");


$userDAO = new UserDAO(); //create object from class
$userDAO->getSpecificUser("userID");

$query = "SELECT*FROM `users`";
$result = mysqli_query($conn, $query) or die("unlucky");
while($row = mysqli_fetch_array($result)){
    echo 
    $row["userID"]. " - ".
    "<a href='../Presentation/userA_edit.php?id=".$row['userID']."'>Edit profile.</a>".
    $row["usersUid"]. " - ". 
    $row["usersEmail"]. " - ". 
    $row["user_level"]." - " .
    "<a href='../Application/del_user.php?id=".$row['userID']."'>delete</a>"." - ". 
    "<a href='../Application/ban_user.php?id=".$row['userID']."'>ban</a>"." - ".
    /*  "<a href='../DataAcces/userDAO.php?fn=deleteUser?>'".$row['userID'].">OOPDelete </a>"."-".*/
    "<a href='../Application/unban_user.php?id=".$row['userID']."'>unban</a><br>";

    
}
?>



