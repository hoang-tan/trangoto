<?php 
include 'config_db/connect.php';
// ktra xem id có trong csdl k


$cate = mysqli_query($conn,"SELECT * FROM category");

//ktra nếu  $_SESSION['cart'] nếu có thì lấy chính nó k thì lấy mảng mảng rỗng 
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

// echo "<pre>";
// print_r($cart);
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
					<th style="text-align: center">STT</th>
					<th style="text-align: center">Ảnh</th>
					<th style="text-align: center">Tên sản phẩm</th>
					<th style="text-align: center">Giá sản phẩm</th>
					<th style="text-align: center">Số lượng</th>
					<th style="text-align: center">Thành tiền</th>
					<th style="text-align: center">Tùy chọn</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($cart as $key => $value) : ?>
					
				<tr>
					<td style="text-align: center"><?php echo $key++ ?></td>
					<td><img src="uploads/<?php echo $value['image'] ?>" alt="" width="200px"></td>
					<td style="text-align: center">
						<h2><?php echo $value['name'] ?></h2>
					</td>
					<td style="text-align: center">
						<h4 style="color: orange"><?php echo number_format($value['price']) ?> $</h4>
					</td>

					<td style="text-align: center">
						<form action="cart.php">
							<input type="hidden" name="action" value="update">
							<input type="hidden" name="id" value="<?php echo $value['id'] ?>">
							<input type="text" name="quantity" value="<?php echo $value['quantity'] ?>" > 
							<button type="submit">Cập nhật</button>
						</form>
					</td>
					<td><h3 style="color: orange"><?php echo number_format($value['price'] *  $value['quantity']) ?>$</h3></td>
					<td style="text-align: center">
						<a href="cart.php?id=<?php echo $value['id'] ?>&action=delete" class="btn btn-danger">Xóa</a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>


	<?php 
	include 'footer.php';

	?>