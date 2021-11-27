<?php 

//upload for posts
include_once '../Presentation/header.php';

include_once '../DataAcces/connectDB.php';

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError= $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $final_file_path = "../uploads/" .$_FILES['file']['name'];
    $userid = $_SESSION["userid"];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

function resize_image($file,$max_resolution){

    //var_dump($file,$max_resolution);

    if(file_exists($file)){
        $original_image = imagecreatefromjpeg($file);

        //resolutions 
        $original_width = imagesx($original_image);
        $original_height = imagesy($original_image);

        //width 
        $ratio =$max_resolution / $original_width;
        $new_width = $max_resolution;
        $new_height = $original_height * $ratio;


       // var_dump($new_width, $new_height);


        //if that didnt work 
        if ($new_height > $max_resolution) {
            $ratio = $max_resolution / $original_height;
            $new_height = $max_resolution;
            $new_width = $original_width * $ratio;
            
            
        }

        if ($original_image) {
            $new_image = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($new_image,$original_image,0,0,0,0,$new_width,$new_height,$original_width,$original_height);

            imagejpeg($new_image,$file,90);



            
        }
    }

    echo "done with resising";
}

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
               // $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../uploads/'.$_FILES['file']['tmp_name'];
                
                move_uploaded_file($_FILES['file']['tmp_name'], $final_file_path);
                

                // move file to directory
                //move_uploaded_file($fileName , $final_file_path);
                resize_image($final_file_path,"400");
                

                //move_uploaded_file($fileName , $final_file_path);
                
                
                // save to db
                

                header("Location:../Presentation/feed.php");
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
