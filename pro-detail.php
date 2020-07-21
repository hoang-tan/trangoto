
<?php 
include'config_db/connect.php';
$product = mysqli_query($conn,"SELECT * FROM product");
$cate = mysqli_query($conn,"SELECT * FROM category");

if(isset($_GET['sp'])){
	$name = $_GET['sp'];
	$product = mysqli_query($conn,"SELECT * FROM product WHERE name = '$name'");
	$data = mysqli_fetch_assoc($product);
	// var_dump($data);
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
						
						
	<a href=""></a>
						
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
				<a href="index.php"><i class="glyphicon glyphicon-home"> ==> </i></a> Sản phẩm
			</div>
		</div>
	</div>

	<section>
		<div class="container">
			<div class="row">
				<form action="cart.php" method="GET">
				<h3>Sản phẩm :<?php echo $data['name'] ?></h3>

				<div class="col-md-4" style="border: 2px solid #ddd">
					<img src="uploads/<?php echo $data['image'] ?>" alt="" >
				</div>

				<div class="col-md-8">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Thông tin chi tiết</h3>
						</div>
						<div class="panel-body">
							<h2 style="margin-left: 30px">Tên sản phẩm :<?php echo $data['name'] ?></h2>
							<h2 style="margin-left: 30px; color: orange;border-bottom: 2px solid #ddd ">Giá sản phẩm : <?php echo number_format($data['price']) ?>$</h2>
							<p>Số lượng: 
								<input type="number" name="quantity" value="1"> 
								<input type="hidden" name="id" value="<?php echo $data['id']?>"> 
								<button type="submit" >
									<a href="cart.php?id=<?php echo $data['id'] ?>">Mua sản phẩm</a>
								</button>
							</p>
							<h2>Mô tả</h2>
							<p>Mô tả sản phẩm :<?php echo $data['descrip'] ?></p>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</section>

	<div class="container-fluid" style="background-color: #C0C0C0">
		<h1 style="font-family: loran; color: black;text-align: center">Xe đang bán chạy</h1>
		<div class="container">
			<div class="row ">
				
				<div class="col-md-3 ">
					<img src="uploads/civic-15-g.jpg" alt="" width="300px" height="auto" class="zoom">
					<h4>HONDA CIVIC 1.5 G</h4>
					<span style="color: black;font-size: 15px"><?php echo number_format($data['price']) ?>$</span>
				</div>

				<div class="col-md-3 ">
					<img src="uploads/civic-1.8.jpg" alt="" width="300px" height="auto" class="zoom">
					<h4>HONDA CIVIC 1.8</h4>
					<span style="color: black;font-size: 15px"><?php echo number_format($data['price']) ?>$</span>
				</div>

				<div class="col-md-3 ">
					<img src="uploads/crv-15.png" alt="" width="300px" height="auto" class="zoom">
					<h4>HONDA CRV 1.5</h4>
					<span style="color: black;font-size: 15px"><?php echo number_format($data['price']) ?>$</span>
				</div>

				<div class="col-md-3 ">
					<img src="uploads/occi24.jpg" alt="" width="300px" height="auto" class="zoom">
					<h4>HONDA Accord 2.4</h4>
					<span style="color: black;font-size: 15px"><?php echo number_format($data['price']) ?>$</span>
				</div>
			</div>

		</div>
	</div>

	<?php 
	include 'footer.php';
	?>