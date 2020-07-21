<?php 
include'config_db/connect.php';
$product = mysqli_query($conn,"SELECT * FROM product");
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
				<a href="index.php"><i class="glyphicon glyphicon-home"> ==> </i></a> Giới thiệu
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<p style="margin-left: 12px">VỀ CHÚNG TÔI</p>
			<div class="col-md-4">
				<img src="http://otohonda.einfo.vn/wp-content/uploads/2016/08/about-us.jpg" alt="" width="300px">
			</div>
			<div class="col-md-8">
				<h3>Chúng tôi là ai?</h3>
				<p>Được khởi tạo bởi những thành viên đam mê công nghệ và am hiểu sâu sắc về lĩnh vực thương mại điện tử, cùng nguồn đầu tư tài chính vững mạnh và kỹ thuật mới nhất QCV Group, chúng tôi luôn nỗ lực để tạo nên những sản phẩm tuyệt vời, góp phần tạo nên sự thành công cho các doanh nghiệp. Với QCV Group, chúng tôi không chỉ thiết kế website mà còn cung cấp cho doanh nghiệp những giải pháp kinh doanh hiệu quả thông qua website của mình… <br> <br>

					Là một công ty thiết kế Website chuyên nghiệp, chúng tôi luôn đảm bảo chất lượng sản phẩm cao nhất cho khách hàng với uy tín và kỹ thuật được tích lũy trong hơn 7 năm. Chúng tôi tự tin sẽ giúp quý khách sẽ đạt được hiệu quả cao nhất trong việc quảng bá thương hiệu của công ty. <br> <br>

					Song song với việc cung cấp các giải pháp, sản phẩm cho các tổ chức, QCV Group còn là một nhà tư vấn và phát triển chuyên nghiệp, uy tín trong chương trình xây dựng và phát triển các mạng thông tin, mạng thương mại, mạng chuyên ngành ở phạm vi quốc gia, khu vực và toàn cầu. <br> <br>

					Thành công và sức mạnh của QCV Group được thể hiện trong việc hợp tác chặt chẽ và hiệu quả với các chuyên gia hàng đầu thuộc các ngành, lĩnh vực kinh tế, xã hội khác cũng như phát huy tối đa sức sáng tạo, tinh thần đoàn kết, tự chủ của tập thể các cán bộ trẻ trung, năng động đang làm việc tại QCV Group.<br> <br>
				</p>
			</div>
		</div>
	</div>
	<?php 
	include 'footer.php';

	?>