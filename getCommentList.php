<?php  
error_reporting(E_ALL); 
ini_set('display_errors',1); 

include('dbcon.php');

echo "yaho";

//POST 값을 읽어온다.
$article_num=isset($_POST['article_num']) ? $_POST['article_num'] : '';

//사용자의 댓글 리스트 읽어오기. where writer_id='$writer_id'
$sql="select * from booktu.comment where article_num='$article_num'";

$stmt=$con->prepare($sql);
$stmt->execute();

$data=array(); 
// extract($row);

?>
