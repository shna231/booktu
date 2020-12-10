<?php  
error_reporting(E_ALL); 
ini_set('display_errors',1); 

include('dbcon.php');

$sql="SELECT * from booktu.discussion_topic WHERE now=1";

$stmt=$con->prepare($sql);
$stmt->execute();

$data=array(); 
// extract($row);

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
       array_push($data,array('book_image'=>$row["book_image"],
        			                'title'=>$row["title"],
			                      	'content'=>$row["content"]));
	}
	
	header('Content-Type: application/json; charset=utf8');
	echo json_encode(array("data"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);


?>
