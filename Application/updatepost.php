<?php
    include_once '../DataAcces/connectDB.php';
    include_once '../DataAcces/connectionFactory.php';

    function updatePost($conn,$post,$id) {
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        $sql = "UPDATE posts SET post = ? WHERE postID = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
           header("location: ../Presentation/profile-edit.php?error=stmtfailed");
           exit();
       }
        mysqli_stmt_bind_param($stmt, "si", $post,$id);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
        
    }
    

    $id = $_GET['id']; 

    $qry = mysqli_query($conn,"SELECT * FROM posts WHERE postid='$id'"); 

    $row = mysqli_fetch_array($qry); 
    
    if(isset($_POST['post'])) 
    {
        $post = $_POST['post'];;

        updatePost($conn, $post, $id); 	
}
?>

<h3>Update Data</h3>

<form method="POST">
  <textarea type="text" name="post"  rows="7" cols="64" style="" placeholder="What's in your head?" required></textarea>
  <input type="submit" name="update" value="Update">
</form>

<?php
/*
    $conn = $dbFactory->createConnection();
    
    $sql = "SELECT * FROM `Posts` WHERE postID='$postid'";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Presentation/feed.php");
        
        exit();
    }
    var_dump($stmt);
    mysqli_stmt_bind_param($stmt, "sii", $content, $userid, $postID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}


if (isset($_POST['postcontent'])) {

    $post = $_POST['postcontent'];
    $image = $_FILES['image'];

    $uploader = new Uploader();
    $filePath  = $uploader->uploadImage($image, "400");

    $feedDB = new PostDAO();
    $filePath  = $feedDB->createPost($conn, $post, $userid, $filePath);

    header("location: ../Presentation/feed.php");
}
else {
    header("location: ../Presentation/feed.php");
    exit();
}*/