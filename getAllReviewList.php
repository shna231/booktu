<?php  
error_reporting(E_ALL); 
ini_set('display_errors',1); 

include('dbcon.php');

$rBookName=isset($_POST['rBookName']) ? $_POST['rBookName'] : '';
$rBookWriter=isset($_POST['rBookWriter']) ? $_POST['rBookWriter'] : '';
$rReviewName=isset($_POST['rReviewName']) ? $_POST['rReviewName'] : '';
$rReviewWriter=isset($_POST['rReviewWriter']) ? $_POST['rReviewWriter'] : '';
$search_word=isset($_POST['search_word']) ? $_POST['search_word'] : '';

$sql="SELECT * from booktu.report";

var_dump($rBookName);

if($rBookName==1 || $rBookWriter==1 || $rReviewName==1 || $rReviewWriter==1) {
	$sql=$sql." WHERE";
}

if($rBookName==1) {
	$sql=$sql." book_title='$search_word'";
}
if($rBookWriter==1) {
	if($rBookName==1){
		$sql=$sql." AND";
	}
	$sql=$sql." book_author='$search_word'";
}
if($rReviewName==1) {
	if($rBookName==1 || $rBookWriter==1){
		$sql=$sql." AND";
	}
	$sql= $sql." title='$search_word'";
}
if($rReviewWriter==1) {
	if($rBookName==1 || $rBookWriter==1 || $rReviewName==1) {
		$sql=$sql." AND"
	}
	$sql= $sql." writer_id='$search_word'";
}

echo $sql

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
