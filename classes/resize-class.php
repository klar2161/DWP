<?php


if(isset($_POST["submit"])) {
    if(is_array($_FILES)) {


        $uploadedFile = $_FILES['file']['tmp_name']; 
        $sourceProperties = getimagesize($uploadedFile);
        $newFileName = time();
        $dirPath = "uploads/";
        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];


        switch ($imageType) {


            case IMAGETYPE_PNG:
                $imageSrc = imagecreatefrompng($uploadedFile); 
                $tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                imagepng($tmp,$dirPath. $newFileName. "_thump.". $ext);
                break;           

            case IMAGETYPE_JPEG:
                $imageSrc = imagecreatefromjpeg($uploadedFile); 
                $tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($tmp,$dirPath. $newFileName. "_thump.". $ext);
                break;
            
            case IMAGETYPE_GIF:
                $imageSrc = imagecreatefromgif($uploadedFile); 
                $tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                imagegif($tmp,$dirPath. $newFileName. "_thump.". $ext);
                break;

            default:
                echo "Invalid Image type.";
                exit;
                break;
        }


        move_uploaded_file($uploadedFile, $dirPath. $newFileName. ".". $ext);
        echo "Image Resize Successfully.";
    }
}


function imageResize($imageSrc,$imageWidth,$imageHeight) {

    $newImageWidth =200;
    $newImageHeight =200;

    $newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
    imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);

    return $newImageLayer;
}
?>