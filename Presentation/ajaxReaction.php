<?php 
include_once '../DataAcces/connectDB.php';
include_once '../DataAcces/connectionFactory.php';
$feedData=$feed->newsFeed();
$sessions_uid=$_SESSION['userid'];
$session_uid='1' ;
if($_POST['postID']  && $_POST['rid'] && $session_uid>0)
{
$post_id=$_POST['postID'];
$rid=$_POST['rid'];
$data=$feed->userReaction($session_uid,$post_id,$rid);
echo $data;
}
?>