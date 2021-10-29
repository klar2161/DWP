<?php

include_once 'header.php';

include_once 'footer.php';

include("classes/user.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	
	<title> Profile page</title>
</head>
<body>

  <form action="upload.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="file">
  <button type="submit" name="submit">UPLOAD</button>
  </form>

<div class="card">
  <img src="https://i.guim.co.uk/img/media/33c508e9f0c30a90df363e3b5cc3925f0b70f5b6/0_0_3600_2159/master/3600.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=6c1e047f1edc4a54f1770458201ed69e" alt="John" style="width:10%">
  <h1><?php if (isset($_SESSION["useruid"])) {
    echo $_SESSION["useruid"] ;
}?></h1>

  <h2><?php if (isset( $_SESSION["useremail"])) {
    echo $_SESSION["useremail"] ;
} ?></h2>
  
  
</div>
</body>
</html>