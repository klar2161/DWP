<?php
    include_once '../DataAcces/connectDB.php';
    include_once '../DataAcces/connectionFactory.php';

    function updatePost($conn,$post,$id) {
        /*$dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

        $sql = "UPDATE posts SET post = ? WHERE postID = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
           header("location: ../Presentation/feed.php");
           exit();
       }
        mysqli_stmt_bind_param($stmt, "si", $post,$id);
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);*/
        
    }
    

    $id = $_GET['id']; 

    $qry = mysqli_query($conn,"SELECT * FROM posts WHERE postid='$id'"); 

    $row = mysqli_fetch_array($qry); 
    
    if(isset($_POST['post'])) 
    {
        $post = $_POST['post'];;

        updatePost($conn, $post, $id); 	

        header("location: ../Presentation/feed.php");
}
?>

<h3>Update Data</h3>

<form method="POST">
  <textarea type="text" name="post"  rows="7" cols="64" style="" placeholder="What's in your head?"  ><?php echo $row["post"]; ?></textarea>
  <input type="submit" name="update" value="Update">
</form>
