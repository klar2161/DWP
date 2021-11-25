<?php

include_once 'header.php';
include_once '../Application/banned.php';
include_once '../DataAcces/userDAO.php';





?>

<section class="index-intro">
    <h2><?php echo ($row["usersUid"]);?></h2>
<?php

$userDAO = new UserDAO(); //create object from class
$row = $userDAO->getSpecificUser($_SESSION["userid"]);

/*
if (isset($_SESSION["useruid"])) {
    echo "<p>Welcome here " . $_SESSION["useruid"] . "</p>";
} 

*/

?>

<?php

include_once 'footer.php';

?>