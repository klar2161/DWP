<?php
ob_start();
if (isset($_POST["sub"])) {
    if(!empty($_POST['g-recaptcha-response']))
    {
          $secret = '6LdYQ48dAAAAAAR6iSgdW6MDXbcj6hKMpxxA9b9T';
          $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
          $responseData = json_decode($verifyResponse);
          if($responseData->success)
              $message = "g-recaptcha varified successfully";    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once '../DataAcces/connectDB.php';
    require_once 'functions.inc.php';
    
    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../Presentation/login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
    }

          else{
              $message = "Some error in vrifying g-recaptcha";
         echo $message;
     }
 }

 else {
    header("location: ../Presentation/login.php");
    exit();
 }