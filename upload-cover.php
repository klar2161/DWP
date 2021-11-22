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

    function resize_image($file,$max_resolution){

        if(file_exists($file)){
            $origial_image = imagecreatefromjpeg($file);
    
            //resolutions 
            $original_width = imagesx($origial_image);
            $original_height = imagesy($origial_image);
    
            //width 
            $ratio =$max_resolution / $original_width;
            $new_width = $max_resolution;
            $new_height = $original_height * $ratio;
    
            //if that didnt work 
            if ($new_height > $max_resolution) {
                $ratio = $max_resolution / $original_height;
                $new_height = $max_resolution;
                $new_width = $original_width * $ratio;
            }
    
            if ($original_image) {
                $new_image = imagecreatetruecolor($new_width, $new_height);
                imagecopyresampled($new_image,$origial_image,0,0,0,0,$new_width,$new_height,$original_width,$original_height);
    
                imagejpeg($new_image,$file,90);
            }
        }
    }

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
               // $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$_FILES['file']['tmp_name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $final_file_path);
                resize_image($file,"800");
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


