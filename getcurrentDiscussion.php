<?php  
error_reporting(E_ALL); 
ini_set('display_errors',1); 

include('dbcon.php');

$topic_num=isset($_POST['topic_num']) ? $_POST['topic_num'] : '';

$sql="SELECT * from booktu.discussion_content WHERE topic_num='$topic_num'";

$stmt=$con->prepare($sql);
$stmt->execute();
 
if ($stmt->rowCount() == 0){
    echo $sql;
    echo "게시글이 존재하지 않습니다";
	
} else{

   	$data=array(); 
	// extract($row);

	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        	array_push($data,array('content_num'=>$row["content_num"],
        			                   'writer_id'=>$row["writer_id"],
				                         'topic_num'=>$row["topic_num"],
                                 'agree'=>$row["agree"],
                                 'title'=>$row["title"],
                                 'content'=>$row["content"]));
	}
	
	header('Content-Type: application/json; charset=utf8');
	echo json_encode(array("data"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    } 


?>
