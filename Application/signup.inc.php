<?php
    require_once '../DataAcces/connectDB.php';
   include_once '../DataAcces/userDAO.php';
   include_once 'functions.inc.php';

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];



    if (emptyInputSignup($email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: ../Presentation/signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../Presentation/signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../Presentation/signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../Presentation/signup.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../Presentation/signup.php?error=usernametaken");
        exit();
    }
    
    $userDB = new UserDAO();
    $filePath  = $userDB->createUser($conn, $email, $username, $pwd);

}
else {
    header("location: ../Presentation/signup.php");
    exit();
}