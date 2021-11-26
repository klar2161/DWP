<?php
include_once("../DataAcces/connectDB.php");
include_once ("../DataAcces/userDAO.php");


$userDAO = new UserDAO(); //create object from class

$query = "SELECT*FROM `Users`";
$result = mysqli_query($conn, $query) or die("unlucky");
while($row = mysqli_fetch_array($result)){
    echo 
    $row["userID"]. " - ".
    $row["usersUid"]. " - ". 
    $row["usersEmail"]. " - ". 
    $row["user_level"]." - " .
    "<a href='../Application/del_user.php?id=".$row['userID']."'>delete</a>"." - ". 
    "<a href='../Application/ban_user.php?id=".$row['userID']."'>ban</a>"." - ".
    /*  "<a href='../DataAcces/userDAO.php?fn=deleteUser?>'".$row['userID'].">OOPDelete </a>"."-".*/
    "<a href='../Application/unban_user.php?id=".$row['userID']."'>unban</a><br>";

    
}
?>

