<?php

include_once 'header.php';
include_once 'footer.php';
include_once '../DataAcces/connectDB.php';
include_once '../Application/functions.inc.php';
include_once '../DataAcces/platformDAO.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    
</head>
<body>
<?php

$userDAO = new PlatformDAO(); //create object from class
$row = $userDAO->getInfoFromDB();




if (isset($_GET["error"])) {
    errorHandlers($_GET["error"]);
}

?>
<form action="../Application/about-update.inc.php" method="post">
        <input type="text" name="Name" value="<?php echo $row["Name"];?>">
        <input type="text" name="Description" value="<?php echo $row["Description"];?>">
        <button type="submit" name="submit">SAVE</button>
    </form>
</body>
</html>