<?php 
include_once '../DataAcces/connectDB.php';
include_once 'testclass.php';
include_once '../Application/session.php';


$feed = new feed();
$feedData=$feed->newsFeed();
$userid=$_SESSION['userid'];

?>
<!DOCTYPE html > 
<html > 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>Work please</title>
<meta content='width=device-width, initial-scale=1' name='viewport'/> 
<link rel="stylesheet" type="text/css" href="tooltipsterReaction.css">
<link rel="stylesheet" type="text/css" href="tipsy.css">
<link rel="stylesheet" type="text/css" href="app.css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery.livequery.js"></script>
<script src="js/jquery.tooltipsterReaction.js"></script>
<script src="js/jquery.tipsy.js"></script>
<script src="js/app.js"></script>
</head>
 
<body> 

<?php 
//isset($postID);

/* */ 
//if(!isset($postID) || !$postID) {
//    return false;
// }

foreach($feedData as $data)
{
 
    $likeCheck=$feed->reactionCheck($userid, $data["postID"]);
    $reactionName='';$likeStatus='';
    //var_dump($likeCheck);
    if(!empty($likeCheck))
    {
        $reactionName=$likeCheck["name"];
        $likeStatus=$likeCheck["likeID"];
    }

    if($likeStatus)
    {
        $like='<a href="#" class="unLike" id="like'.$data["postID"].'" rel="unlike"><i class="'.trim(strtolower($reactionName)).'IconSmall likeTypeSmall" ></i>'.$reactionName.'</a>';	
        }
    else
    {
        $like='<a href="#" class="reaction" id="like'.$data["postID"].'" rel="like"><i class="likeIconDefault" ></i>Like</a>';
    }


    ?>
    <div class="messageBody" id="msg<?php echo $data["postID"];
    ?>">

    <img src="<?php echo $data["profile_img"]; ?>" class="messageImg"/>

    </div>
    <?php echo $data["post"]; ?>
    <div class="messageFooter">
    <?php echo $like; ?>



<?php } 
?>
</body> 
</html> 



 

