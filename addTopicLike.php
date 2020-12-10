<?php 
error_reporting(E_ALL); 
ini_set('display_errors',1); 

include('dbcon.php');

$topic_num=isset($_POST['topic_num']) ? $_POST['topic_num'] : '';

$android=strpos($_SERVER['HTTP_USER_AGENT'], "Android");

$sql="UPDATE booktu.discussion_topic SET liked = liked+1 WHERE topic_num='$topic_num';";

$stmt=$con->prepare($sql);
$stmt->execute();

echo "sucess"
?>
