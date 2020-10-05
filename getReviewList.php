<?php  
error_reporting(E_ALL); 
ini_set('display_errors',1); 

include('dbcon.php');

//POST 값을 읽어온다.
$id=isset($_POST['id']) ? $_POST['id'] : '';

//사용자의 독후감 리스트 읽어오기.
$sql="select book_image, title, content from report where writer_id='$id'";

$stmt=$con->prepare($sql);
$stmt->execute();
 
if ($stmt->rowCount() == 0){
    echo "독후감이 존재하지 않습니다";
	
} else{

   	$data=array(); 
	// extract($row);

	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        	array_push($data,array('book_image'=>$row["book_image"],
        			'title'=>$row["title"],
				'content'=>$row["content"]));
	}
	
	header('Content-Type: application/json; charset=utf8');
	echo json_encode(array("data"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    } 

?>
