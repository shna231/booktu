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
if(!$rBookName=="" || !$rBookWriter=="" || !$rReviewName=="" || !$rReviewWriter=="") {
  $sql=$sql.$rBookName.$rBookWriter.$rReviewName.$rReviewWriter;
}
 
echo $sql;


?>
