<?php
include_once '../upload.php';
include_once '../upload-cover.php';
include_once 'header.php';
include_once '../DataAcces/userDAO.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	
	<title> Profile page</title>
</head>
<body>

<?php
$userDAO = new UserDAO(); //create object from class
$row = $userDAO->getSpecificUser($_SESSION["userid"]);
?>

<div class="container-profile">
<img src="<?php
  echo $row["cover_img"] ?? "uploads/placeholder.png";
  ?>" alt="" style="width:100%;height:500px">

<form class="form-cover" action="../Application/upload-cover.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="file">
  <button type="submit" name="submit">UPLOAD COVER</button>
</form>


<div class="card">
  
  <img src="<?php
  echo $row["profile_img"] ?? "uploads/default.jpeg";
  ?>" alt="" >
  <br></br>

 <form class="form-upload" action="../Application/upload.php" method="POST" enctype="multipart/form-data">
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
<?php
include_once 'footer.php';