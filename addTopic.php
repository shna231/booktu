<?php 
error_reporting(E_ALL); 
ini_set('display_errors',1); 

include('dbcon.php');

$topic=isset($_POST['topic']) ? $_POST['topic'] : '';

$android=strpos($_SERVER['HTTP_USER_AGENT'], "Android");

$sql="INSERT INTO booktu.discussion_topic (topic, content) VALUES ('$article_num', '$writer_id', '$content')";

$stmt=$con->prepare($sql);
$stmt->execute();

echo "sucess"
?>
