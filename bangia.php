<?php 
include'config_db/connect.php';
$product = mysqli_query($conn,"SELECT * FROM product");
// $pro = mysqli_fetch_assoc($product);
// var_dump($pro);
$cate = mysqli_query($conn,"SELECT * FROM category");

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

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
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
						<button style="font-size: 18px;margin-top: 30px"><a href="cart.php"><i class="glyphicon glyphicon-shopping-cart"></i>Giỏ hàng</a></button>

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
			<a href="index.php"><i class="glyphicon glyphicon-home"> ==> </i></a> Bảng giá
		</div>
	</div>
</div>

<div class="container">
	<h4>Bảng giá</h4>
	<h3>Bảng Giá Xe</h3>
	<p>Kính chào quý khách <br> <br>

	Thủy xin gửi đến quý khách bảng giá Honda mới nhất tại Honda Ô tô  . Giá dưới đây là Giá Bán Lẻ Đề Xuất (GBLDX) đã bao gồm Giá trị gia tăng (VAT) 10%. Giá không bao gồm các loại thuế và khoảng phí khi đăng kí xe, giá phụ kiện và các chương trình khuyến mãi kèm theo. Đây là bảng niêm yết Honda Việt Nam nên cập nhật mức giá tốt nhất quý khách liên hệ với 0377301294 hoặc điền form báo giá nhanh <br> Cảm ơn.</p> 
	<!-- <div class="row">
		<?php foreach ($product as $key => $value) : ?>
		<div class="col-md-6">
			<img src="uploads/<?php echo $value['image'] ?>" alt="">
			<div class="col-md-3">
			<h4><?php echo $value['name'] ?></h4>
			<p><?php echo number_format($value['price']) ?>$</p>
		</div>
		</div>
		
		<?php endforeach ?>
		
	
	</div>
 -->
</div>

<div class="container">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th style="text-align: center">STT</th>
					<th style="text-align: center">Hình Ảnh</th>
					<th style="text-align: center">Tên xe</th>
					<th style="text-align: center">Giá</th>
					<th style="text-align: center">Chi tiết</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($product as $key => $value) : ?>
				<tr>
					<td style="text-align: center"><?php echo $key +1 ?></td>
					<td style="width: 100px"><img src="uploads/<?php echo $value['image'] ?>" alt=""></td>
					<td style="text-align: center;color: red"><h3><?php echo $value['name'] ?></h3></td>
					<td style="text-align: center;color: red"><h3><?php echo number_format($value['price']) ?>$</h3></td>
					<td style="text-align: center">
						<a href="pro-detail.php?sp=<?php echo$value['name'] ?>" class="btn btn-success">Xem Chi Tiết</a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
 <?php 
include 'footer.php';

  ?>