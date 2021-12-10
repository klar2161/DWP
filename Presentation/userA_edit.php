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
    $id = $_GET['id']; 

    $qry = mysqli_query($conn,"SELECT * FROM users WHERE userID='$id'"); 

    $row = mysqli_fetch_array($qry); 
?>  

<form method="post">
    <input type="hidden" name="id" value="<?php echo $row["userID"];?>">
    <input type="text" name="email" value="<?php echo $row["usersEmail"];?>">
    <input type="text" name="uid" value="<?php echo $row["usersUid"];?>">
    <input type="submit" name="submit" value="Update">
</form>

<?php

    
    if(isset($_POST['submit'])) 
    {       
        $id = $_POST["id"];
        $email = $_POST["email"];
        $username = $_POST["uid"];
        
        $adminUpdate = new UserDAO();
        $adminUpdate->updateUserAdmin($email,$username,$id);
    
    }  

?> 
</body>
</html>