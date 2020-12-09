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
  $sql=$sql." WHERE";
}
 
// 첫 옵션이 체크 > AND 없이 붙임
  if(!$rBookName==""){
    $sql=$sql.$rBookName.'$search_word';
  }
  
  // 두번째 옵션이 체크
  if(!$rBookWriter==""){
    // 앞 옵션 중 하나라도 있었다면 AND 추가 후 붙임
    if(!$rBookName==""){
      $sql=$sql." AND"
    }
    $sql=$sql.$rBookWriter.'$search_word';
  }
  
   // 세번째 옵션이 체크
  if(!$rReviewName==""){
    // 앞 옵션 중 하나라도 있었다면 AND 추가 후 붙임
    if(!$rBookName=="" || !$rBookWriter==""){
      $sql=$sql." AND"
    }
    $sql=$sql.$rBookWriter.'$search_word';
  }
  
   // 네번째 옵션이 체크
  if(!$rReviewName==""){
    // 앞 옵션 중 하나라도 있었다면 AND 추가 후 붙임
    if(!$rBookName=="" || !$rBookWriter=="" || !$rReviewName==""){
      $sql=$sql." AND"
    }
    $sql=$sql.$rBookWriter.'$search_word';
  }

echo $sql;


?>
