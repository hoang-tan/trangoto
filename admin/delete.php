<?php 

include'../config_db/connect.php';
if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
}else{
	header('location: index.php');
}
// ktra xem id có k 
 if(isset($_GET['id'])){
 	$id = $_GET['id'];
 	// truy vẫn xóa 1 id
 	$data =mysqli_query($conn,"DELETE FROM category Where id = '$id'");
 	header('location: category.php');
 }

 ?>