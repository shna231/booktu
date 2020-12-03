<?php 
error_reporting(E_ALL); 
ini_set('display_errors',1); 

include('dbcon.php');

$article_num=isset($_POST['article_num']) ? $_POST['article_num'] : '';
$writer_id=isset($_POST['writer_id']) ? $_POST['writer_id'] : '';
$content=isset($_POST['content']) ? $_POST['content'] : '';

$android=strpos($_SERVER['HTTP_USER_AGENT'], "Android");

$sql="INSERT INTO booktu.comment (article_num, writer_id, content) VALUES ('$article_num', '$writer_id', '$content')";

$stmt=$con->prepare($sql);
$stmt->execute();

echo "sucess"
?>
