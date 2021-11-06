<?php

include_once 'header.php';
include_once 'footer.php';
include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	
	<title> Profile page</title>
</head>
<body>
<?php
include_once 'includes/dbh.inc.php';
$userId = $_SESSION["userid"] ;

$sql = "SELECT * FROM users WHERE userID = ?";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($resultData);

mysqli_stmt_close($stmt);
?>

  <form action="upload.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="file">
  <button type="submit" name="submit">UPLOAD</button>
  </form>

<div class="card">
  <img src="<?php
  echo $row["profile_img"] ?? "uploads/default.jpeg";
  ?>" alt="" style="width:10%">

  <h1><?php 
  echo htmlspecialchars($row["usersUid"]);
  ?></h1>

<h2><?php 
  echo htmlspecialchars($row["usersEmail"]);
  ?></h2>
  
  <a href="profile-edit.php">
  <button type="submit" name="submit">EDIT</button>
  </a>

</div>
</body>
</html>