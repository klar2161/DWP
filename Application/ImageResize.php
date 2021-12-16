<?php
ob_start();

    // *** Include the class
    include_once("../DataAcces/connectDB.php");
    include("resize-class.php");

    // *** 1) Initialise / load image
    $resizeObj = new resize('uploads');

    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(200, 200, 'crop');

    // *** 3) Save image
    $resizeObj -> saveImage('uploads', 1000);

?>