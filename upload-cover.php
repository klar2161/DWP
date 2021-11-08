<?php
include_once 'header.php';

include_once 'includes/dbh.inc.php';

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError= $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $final_file_path = "uploads/" .$_FILES['file']['name'];
    $userid = $_SESSION["userid"];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
               // $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$_FILES['file']['tmp_name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $final_file_path);
                // save to db
                $sql = "UPDATE users SET cover_img = ? WHERE userID = ?";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt, "si", $final_file_path,$userid);
                mysqli_stmt_execute($stmt);
                
                mysqli_stmt_close($stmt);
                header("Location: profile.php?uploadsucess");
            } else{
                echo "Your file is too big!";
            }
        } else{
            echo "There was an error uploading your file!";
        }
    } else{
        echo "You can not upload files of this type!";
    }
}


