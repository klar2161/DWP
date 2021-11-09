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
<div class="container-profile">
<img src="<?php
  echo $row["cover_img"] ?? "uploads/placeholder.png";
  ?>" alt="" style="width:100%;height:500px">

<form class="form-cover" action="upload-cover.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="file">
  <button type="submit" name="submit">UPLOAD COVER</button>
</form>


<div class="card">
  
  <img src="<?php
  echo $row["profile_img"] ?? "uploads/default.jpeg";
  ?>" alt="" style="width:30%">
  <br></br>

 <form class="form-upload" action="upload.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="file">
  <button type="submit" name="submit">UPLOAD</button>
  </form>


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

</div>
</body>
</html>