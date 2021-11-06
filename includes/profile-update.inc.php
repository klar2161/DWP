<?php
    include_once 'dbh.inc.php';
session_start();

if (isset($_POST["submit"])) {
    $username = $_POST["uid"];
    $email = $_POST["email"];
    $userid = $_SESSION["userid"];

    // TODO check if empty, add updated to session
    $sql = "UPDATE users SET usersEmail = ?, usersUid = ? WHERE userID = ?";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt, "ssi", $email,$username,$userid);
                mysqli_stmt_execute($stmt);
                
                mysqli_stmt_close($stmt);
  

                header("location: ../profile.php");
 }

 else {
    header("location: ../profile-edit.php");
    exit();
 }