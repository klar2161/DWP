<?php

class Uploader {

    public function uploadImage($file, $resizeSize){
    //$file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError= $file['error'];
    $fileType = $file['type'];
    $final_file_path = "../uploads/" .$file['name'];
    //$userid = $_SESSION["userid"];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if ($fileError === 0) {
        if ($fileSize < 1000000) {
           // $fileNameNew = uniqid('', true).".".$fileActualExt;
            //$fileDestination = '../uploads/'.$file['tmp_name'];
            
            move_uploaded_file($file['tmp_name'], $final_file_path);
            
            $this->resizeImage($final_file_path,$resizeSize);

            return $final_file_path;
        }
    }
}
    private function resizeImage($file,$max_resolution){
        
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
}
