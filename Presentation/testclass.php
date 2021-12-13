<?php
include_once '../DataAcces/connectDB.php';
include_once '../DataAcces/connectionFactory.php';

class feed
{
	 /* News Feed Data */
       public function newsFeed()
     {
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();
        $sql = "SELECT U.userID, U.usersUid, U.usersEmail,U.profile_img, P.postID, P.post, P.like_count FROM  users U,posts P WHERE U.userID=P.userID ORDER BY P.postID DESC";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
        $data = mysqli_stmt_get_result($stmt);
        //$data = mysqli_fetch_object($resultData);
        mysqli_stmt_close($stmt);

        return $data;
     }

      /* User Reaction Check  */
     public function reactionCheck($userID, $postID)
     {
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();
        $sql = "SELECT L.likeID, R.name FROM post_like L, reactions R WHERE R.rid=L.rid_fk AND L.postID_fk=?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "i",  $postID);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($resultData);
        mysqli_stmt_close($stmt);

        return $row;
     }
   

      /* News Feed Data */
     public function userReaction($userID,$postID,$rid)
     {
        $dbFactory = new connectionFactory();
        $conn = $dbFactory->createConnection();

		$sql="SELECT likeID FROM post_like WHERE userID_fk = ? AND postID_fk = ?";  
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ii",  $userID,$postID);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $rowcount= mysqli_num_rows($resultData); // counts the row of the result set
        mysqli_stmt_close($stmt);


		if($rowcount > 0)
        {
            $sql = "DELETE FROM  post_like WHERE  userID_fk = ? AND postID_fk = ?";  
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "ii", $userID ,$postID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return 2;
        }
        else
        {
            $sql ="INSERT INTO post_like (postID_fk, userID_fk, created, rid_fk) VALUES (?, ?, ?, ?)"; 
            $created=time();
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "iiii", $postID, $userID, $created,$rid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
		    return 1;
        }

		
     }


}

 ?>