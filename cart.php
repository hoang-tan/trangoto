<?php 
include 'config_db/connect.php';
//bước 1: ktra xem id có trong csdl k
if(isset($_GET['id'])){
	$id = $_GET['id'];

}

// gắn $action = nếu tồn tại $_GET['action'] thì bằng nó k thì = add
$action = (isset($_GET['action'])) ? $_GET['action'] : 'add' ;

$quantity = (isset($_GET['quantity'])) ? $_GET['quantity'] : 1;  
// echo $action;
// echo "<br>";
// // echo $id;
// var_dump($action);
// die();
$cate = mysqli_query($conn,"SELECT * FROM category");
$query = mysqli_query($conn,"SELECT * FROM product WHERE id = '$id'");

//bước 2: ktra nếu query đúng thì chả về mảng assoc
if($query){
	$product = mysqli_fetch_assoc($query);
}


//bước 3: khởi tạo 1 mảng item
$item = [
	'id'=> $product['id'],
	'name'=> $product['name'],
	'image'=> $product['image'],
	// nếu có giá khuyển mại mà lớn hơn 0 thì lấy giá khuyến mãi k thì lấy giá gốc
	'price'=> ($product['sale_price'] >0 ) ? $product['sale_price'] : $product['price'],
	'quantity'=> $quantity
];

// bước 4:
// ktra nếu ở trang index ấn vào mua ngay nếu k có mặc định cho là add
// sử dụng session để lưu , muốn thêm đc 2 sp # nhau  thì thêm mảng đa chiều thêm id
// ktra nếu giỏ hàng có sp ý rồi thì tăng lên 1 còn chưa có thì thêm mới sản phẩm
// thêm mới vào giỏ hàng
if($action == 'add'){
	if(isset($_SESSION['cart'][$id])){	
	$_SESSION['cart'][$id]['quantity'] += $quantity ;	
}
else{
	$_SESSION['cart'][$id] = $item;
}
}
header('location: view-cart.php');
// echo "<pre>";
// print_r($_SESSION['cart']);

// cập nhật giỏ hàng
if($action == 'update'){
	$_SESSION['cart'][$id]['quantity'] = $quantity ;
}

// xóa sản phẩm
if($action == 'delete'){
	unset($_SESSION['cart'][$id]);
}


?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Title Page</title>
	<link rel="stylesheet" href="css/style.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	</head>
	<body>

		<div class="infor" >
			<div class="container">
				<div class="col-md-6">
					<i class="glyphicon glyphicon-envelope">Email:tannguyen@gmail.com</i>
					<i class="glyphicon glyphicon-earphone">Phone:0377301294</i>
				</div>
			</div>
		</div>

		<div class="logo">
			<div class="container">
				<div class="row">
					<div class="col-md-3"><img src="https://brasol.vn/public/ckeditor/uploads/tin-tuc/%C3%9D-ngh%C4%A9a-thi%E1%BA%BFt-k%E1%BA%BF-logo-c%E1%BB%A7a-nh%E1%BB%AFng-th%C6%B0%C6%A1ng-hi%E1%BB%87u-xe-%C4%91%C3%ACnh-%C4%91%C3%A1m.png" alt="" width="150px" height="100px">
					</div>
					<!-- end col-md-3 -->

					<div class="col-md-6" style="margin-top: 32px">
						
						
						<input type="text" style="height: 30px; width: 350px" placeholder="Tìm kiếm"><button style="font-size: 17px"><i class="glyphicon glyphicon-search"></i></button>
						
						

						
					</div>
					<!-- end col-md-6 -->
					
					<div class="col-md-3">
						<button style="font-size: 18px;margin-top: 30px"><a href="#"><i class="glyphicon glyphicon-shopping-cart"></i>Giỏ hàng</a></button>

						<!-- <button style="font-size: 18px;margin-top: 10px"><a href="#">
						<i class="glyphicon glyphicon-user"></i>Đăng ký</a>

						<button style="font-size: 18px;margin-top: 10px"><a href="#">
						<i class="glyphicon glyphicon-user"></i>Đăng nhập</a>
					</button> -->
				</div>
				<!-- end col-md-3 -->
				
			</div>
			<!-- end row -->
		</div>
	</div>


	<!-- header -->
	<div class="headers">
		<nav class="navbar navbar-default" role="navigation" style="margin-bottom: 1px">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse" >
					<ul class="nav navbar-nav" >
						<li class="item-level-1"><a href="index.php" style="color: white;">Home</a></li>
						<li class="item-level-1"><a href="gioithieu.php" style="color: white;">Giới thiệu</a></li>
						<li class="item-level-1"><a href="#" style="color: white;">Sản phẩm</a>
							
							<ul class="menu-level-2">
								<?php foreach ($cate as $key => $value) : ?>
									<li class="item-level-2">
										<a href="#"><?php echo $value['name'] ?></a>
									</li>
								<?php endforeach ?>
							</ul>
							
						</li>
						<li class="item-level-1"><a href="bangia.php" style="color: white;">Bảng Giá</a></li>
						<li class="item-level-1"><a href="#" style="color: white;">Tin tức</a></li>
						<li class="item-level-1"><a href="#" style="color: white;">Liên hệ</a></li>
					</ul>

				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</div>
	<div class="container">
		<div class="gioithieu">
			<div style="border: 1px solid #ddd;margin-top: 10px">
				<a href="index.php"><i class="glyphicon glyphicon-home"> ==> </i></a> Giỏ hàng
			</div>
		</div>
	</div>

	<div class="container">
		<h3>Giỏ hàng</h3>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>STT</th>
					<th>Ảnh</th>
					<th>Tên sản phẩm</th>
					<th>Giá sản phẩm</th>
					<th>Số lượng</th>
					<th>Tổng cộng</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>


	<?php 
	include 'footer.php';

	?>