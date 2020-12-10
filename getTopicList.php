<?php  
error_reporting(E_ALL); 
ini_set('display_errors',1); 

include('dbcon.php');


$sql="SELECT * from booktu.discussion_topic";
 

$stmt=$con->prepare($sql);
$stmt->execute();
 
if ($stmt->rowCount() == 0){
    echo $sql;
    echo "독후감이 존재하지 않습니다";
	
} else{

   	$data=array(); 
	// extract($row);

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
       array_push($data,array('topic_num'=>$row["topic_num"],
        			                'topic'=>$row["topic"],
			      			            'topic_book'=>$row["topic_book"],
			                      	'topic_book_image'=>$row["topic_book_image"],
			     		              	'now'=>$row["now"],
			     		              	'selected'=>$row["selected"],
			     			              'liked'=>$row["liked"]));
	}
	
	header('Content-Type: application/json; charset=utf8');
	echo json_encode(array("data"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    } 


?>
