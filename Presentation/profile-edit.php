<?php

include_once 'header.php';
include_once 'footer.php';
include_once '../DataAcces/connectDB.php';
include_once '../Application/functions.inc.php';
include_once '../DataAcces/userDAO.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    
</head>
<body>
<?php

$userDAO = new UserDAO(); //create object from class
$row = $userDAO->getSpecificUser($_SESSION["userid"]);




if (isset($_GET["error"])) {
    errorHandlers($_GET["error"]);
}

?>
<form action="../Application/profile-update.inc.php" method="post">
        <input type="text" name="email" value="<?php echo $row["usersEmail"];?>">
        <input type="text" name="uid" value="<?php echo $row["usersUid"];?>">
        <button type="submit" name="submit">SAVE</button>
    </form>
</body>
</html>