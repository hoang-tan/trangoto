<?php 
include'header.php';

?>

<!-- product -->
<div class="container">
	<div class="row" style="margin-top: 10px">
		<div class="col-md-3" >
			<div class="panel panel-info">
				<div class="panel-heading" style="background-color: red">
					<h3 class="panel-title" style="color: white;text-align: center;font-size: 18px">Danh mục sản phẩm</h3>
				</div>
				<div class="panel-body">
					<ul class="list-group">
						<?php foreach ($cate as $key => $value) : ?>
							<a href="view-pro.php?san_pham=<?php echo $value['name'] ?>" style="color: black"><li class="list-group-item"><i class="glyphicon glyphicon-arrow-right"> <?php echo $value['name'] ?></i></li></a>
							
						<?php endforeach ?>
					</ul>
				</div>
			</div>

			<div class="ggmap">
				<h2>Địa chỉ chúng tôi</h2>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7571225153333!2d105.70087910731255!3d21.002370794050726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313453e91efd694b%3A0x75417c0cb5b1d0f5!2zxJDDoG8gTmd1ecOqbiwgQW4gVGjGsOG7o25nLCBIb8OgaSDEkOG7qWMsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2sus!4v1591583989067!5m2!1svi!2sus" width="270px" height="350px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
			<div class="intro">
				<h2>Giới thiệu nhanh</h2>
				<iframe width="270" height="250" src="https://www.youtube.com/embed/RxvnoW1JScg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-info" style="border: none">
				<div class="panel-heading" style="background-color: red">
					<h3 class="panel-title" style="text-align: center;color: white; font-size: 18px">Sản phẩm của chúng tôi</h3>
				</div>
				<div class="panel-body " style="padding:0px">
					<?php foreach ($product as  $value) : ?>
						<div class="col-md-4" >
							<div class="thumbnail" style="border:none">
								<img src="uploads/<?php echo $value['image'] ?>" alt="">
								<div class="caption">
									<h3><?php echo $value['name'] ?></h3>
									<p style="text-align: center">Giá: <?php echo number_format($value['price']) ?>$</p>
									<p>
										<a href="pro-detail.php?sp=<?php echo $value['name'] ?>" class="btn btn-success">Xem sản phẩm</a>
										<a href="cart.php?id=<?php echo $value['id'] ?>" class="btn btn-info">Mua ngay</a>
									</p>
								</div>
							</div>	
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</div>

<section style="background-color: red">
	<h1 style="color: white; text-align: center;padding: 10px; font-family: Lora">Tại sao lên chọn Ô TÔ ? <br>________</h1>
</section>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<img src="image/laixe.jpg" alt="" width="100%">
		</div>
		<div class="col-md-3">
			<h4 style="color: red ; margin-top: 30px">GÍA ƯU ĐÃI - GIAO XE NHANH</h4>
			<span>Honda Ô tô  luôn cam kết mang lại mức giá ưu đãi nhất cho quý khách với thời gian giao xe nhanh nhất.</span>

			<h4 style="color: red ; margin-top: 80px">LÁI THỬ XE TẬN NHÀ</h4>
			<span>Lái thử xe là một bước rất quan trọng, Thủy sẽ hỗ trợ Quý khách nhanh chóng trải nghiệm xe Honda mà không tốn thời gian.</span>
		</div>

		<div class="col-md-3">
			<h4 style="color: red ; margin-top: 30px">KHUYẾN MÃI NHIỀU NHẤT</h4>
			<span>Với hoạt động bán hàng sôi nổi, chúng tôi luôn cập nhật sớm nhất các chương trình khuyến mãi của hãng và đại lý.</span>

			<h4 style="color: red ; margin-top: 80px">HỖ TRỢ TƯ VẤN TẬN TÌNH</h4>
			<span>Với nhiều năm kinh nghiệm tư vấn trong ngành ô tô và thủ tục trả góp ngân hàng , Thủy sẽ hỗ trợ Quý Khách chọn được chiếc xe ô tô ưng ý với mức giá tốt nhất</span>
		</div>
	</div>
</div>

<div class="container-fluid" style="background-color: #C0C0C0">
	<h1 style="font-family: loran; color: black;text-align: center">Tin tức nổi bật</h1>
	<div class="container">
		<div class="row ">
			
			<div class="col-md-3 ">
				<a href="#"><img src="http://otohonda.einfo.vn/wp-content/uploads/2018/11/honda-city-2017-in-saigon-_img1375-115723-400x400.jpg" alt="" width="300px" height="auto" class="zoom">
					<h4><a href="#">Đánh giá tri tiết HONDA CITY 1.5</a></h4></a>
				</div>

				<div class="col-md-3 ">
					<a href="#"><img src="http://otohonda.einfo.vn/wp-content/uploads/2018/11/Honda_Civic_2017-1-600x600.jpg" alt="" width="300px" height="auto" class="zoom">
						<h4><a href="#">HONDA CIVIC HATCHBACK 2017 CHÍNH THỨC TRÌNH LÀNG</a></h4></a>
					</div>

					<div class="col-md-3 ">
						<a href="#"><img src="http://otohonda.einfo.vn/wp-content/uploads/2018/11/Honda_Civic_Si_Hatchback_2017-2-400x400.jpg" alt="" width="300px" height="auto" class="zoom"></a>
						<h4><a href="#">HONDA SẮP CHÌNH LÀNG PHIÊN BẢN SIVIC MỚI</a></h4>
					</div>

					<div class="col-md-3 ">
						<a href="#"><img src="http://otohonda.einfo.vn/wp-content/uploads/2018/11/2015-honda-cr-v-series-ii-4wd-limited-edition-front-three-quarters_1427-400x400.jpg" alt="" width="300px" height="auto" class="zoom"></a>
						<h4><a href="#">HONDA CRV CÓ THÊM PHIÊN BẢN LIMITED</a></h4>
					</div>
				</div>

			</div>
		</div>

		<!-- end container-fuil -->


		<?php 
		include 'footer.php';
		?>