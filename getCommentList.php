<?php  
error_reporting(E_ALL); 
ini_set('display_errors',1); 

include('dbcon.php');

//POST 값을 읽어온다.
$article_num=isset($_POST['article_num']) ? $_POST['article_num'] : '';

//사용자의 댓글 리스트 읽어오기. where writer_id='$writer_id'
$sql="select * from booktu.comment where article_num='$article_num'";

$stmt=$con->prepare($sql);
$stmt->execute();

$data=array(); 
// extract($row);
 
if ($stmt->rowCount() == 0){
	echo '없습니다.'
        	array_push($data,array('comment_num'=>-1,
        			                   'article_num'=>$article_num,
				                   'writer_id'=>"NONE",
                                 		   'content'=>"댓글이 존재하지 않습니다. 첫번째 댓글을 남겨주세요!"));
} else{
	
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        	array_push($data,array('comment_num'=>$row["comment_num"],
        			                   'article_num'=>$row["article_num"],
				                   'writer_id'=>$row["writer_id"],
                                 		   'content'=>$row["content"]));
	}
	
    } 

	header('Content-Type: application/json; charset=utf8');
	echo json_encode(array("data"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);

?>
