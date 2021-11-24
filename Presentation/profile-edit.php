<?php

include_once 'header.php';
include_once 'footer.php';
include_once 'includes/dbh.inc.php';
include_once 'includes/functions.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    
</head>
<body>
<?php

$userId = $_SESSION["userid"] ;

$sql = "SELECT * FROM users WHERE userID = ?";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($resultData);

mysqli_stmt_close($stmt);


if (isset($_GET["error"])) {
    errorHandlers($_GET["error"]);
}

?>
<form action="includes/profile-update.inc.php" method="post">
        <input type="text" name="email" value="<?php echo $row["usersEmail"];?>">
        <input type="text" name="uid" value="<?php echo $row["usersUid"];?>">
        <button type="submit" name="submit">SAVE</button>
    </form>
</body>
</html>