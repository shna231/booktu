<?php 
error_reporting(E_ALL); 
ini_set('display_errors',1); 

include('dbcon.php');

$topic_num=isset($_POST['topic_num']) ? $_POST['topic_num'] : '';
$sql1="SELECT liked FROM booktu.discussion_topic WHERE topic_num='$topic_num'";

$stmt=$con->prepare($sql1);
$stmt->execute();

echo $sql1;


?>
