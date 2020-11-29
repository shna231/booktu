<?php 
error_reporting(E_ALL); 
ini_set('display_errors',1); 

include('dbcon.php');

$writer_id=isset($_POST['writer_id']) ? $_POST['writer_id'] : '';
$title=isset($_POST['title']) ? $_POST['title'] : '';
$content=isset($_POST['content']) ? $_POST['content'] : '';

$book_title=isset($_POST['book_title']) ? $_POST['book_title'] : '';
$book_image=isset($_POST['book_image']) ? $_POST['book_image'] : '';
$book_publisher=isset($_POST['book_publisher']) ? $_POST['book_publisher'] : '';
$book_author=isset($_POST['book_author']) ? $_POST['book_author'] : '';

$android=strpos($_SERVER['HTTP_USER_AGENT'], "Android");

$sql="INSERT INTO booktu.report (writer_id, title, content, book_title, book_image, book_publisher, book_author) VALUES ('$writer_id', '$title', '$content', '$book_title', '$book_image', '$book_publisher', '$book_author'
)";

$stmt=$con->prepare($sql);
$stmt->execute();

echo "sucess"
?>


