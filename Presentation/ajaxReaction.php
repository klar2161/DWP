<?php 
include_once '../DataAcces/connectDB.php';
include_once '../DataAcces/connectionFactory.php';
include_once '../Application/session.php';
include_once 'testclass.php';
$feed = new feed();
$feedData=$feed->newsFeed();

$sessions_uid=$_SESSION['userid'];
$session_uid='1';
if($_POST['postID']  && $_POST['rid'] && $session_uid>0)
{
$postID=$_POST['postID'];
$rid=$_POST['rid'];
$data=$feed->userReaction($session_uid,$postID,$rid);
echo $data;
}

$feedData=$feed->newsFeed();

?>