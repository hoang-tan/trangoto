<?php 
include '../config_db/connect.php';

if(isset($_GET['id'])){
	$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM product WHERE id='$id'");
header('location: list-pro.php');
}

 ?>