<?php 
error_reporting(E_ALL); 
ini_set('display_errors',1); 

include('dbcon.php');

$topic_num=isset($_POST['topic_num']) ? $_POST['topic_num'] : '';

$android=strpos($_SERVER['HTTP_USER_AGENT'], "Android");

$sql1="SELECT liked FROM booktu.discussion_topic WHERE topic_num='$topic_num'";
$sql1 += 1;

echo $sql1;


?>
