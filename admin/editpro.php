<?php 
$conn = mysqli_connect('localhost','root','','doanky1');
mysqli_set_charset($conn,'utf8');
ob_start();
include'header.php';
	$category = mysqli_query($conn,"SELECT * FROM category");


	// kiểm tra xem có id chưa
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$product = mysqli_query($conn,"SELECT * FROM product WHERE id = '$id'");
		$pro = mysqli_fetch_assoc($product);
	}

	if(isset($_POST['name'])){
		$name = $_POST['name'];
		$cate_id = $_POST['cate_id'];
		$price = $_POST['price'];
		$sale_price = $_POST['sale_price'];
		$status = $_POST['status'];
		$descrip = $_POST['descrip'];
		// var_dump($_POST);
		

		
		// ktra để thêm ảnh 
		if(isset($_FILES['image'])){
				$file = $_FILES['image'];
				$file_name = $file['name'];
				move_uploaded_file($file['tmp_name'],'uploads/'.$file_name);
				// var_dump($file_name );
			}
		
		$data = mysqli_query($conn,"UPDATE  product SET name = '$name', cate_id='$cate_id', price = '$price', sale_price = '$sale_price', image = '$file_name', status = '$status', descrip = '$descrip' WHERE id = '$id' ");
		// var_dump($data);
		header('location: list-pro.php');
	}
 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

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
		

		<section class="container">
	<div class="row" style="margin-left: 250px">
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Sửa Sản phẩm</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" role="form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Tên sản phẩm</label>
					<input type="text" class="form-control" id="name" placeholder="Input field" name="name" onkeyup="ChangeToSlug()" value="<?php echo $pro['name']?>">
				</div>

				<div class="form-group">
					<label for="">Danh mục</label>
					<select name="cate_id" id="input" class="form-control" required="required">
						<option value="">______Danh Sách______</option>
						<?php foreach ($category as $key => $value) : ?>
						<option value="<?php echo $value['id'] ?>" <?php echo(($value['id'] == $pro['cate_id']) ? 'selected' : '') ?>> <?php echo $value['name']?></option>
					<?php endforeach ?>
					</select>
				</div>

				<div class="form-group">
					<label for="">Giá sản phẩm</label>
					<input type="text" class="form-control" placeholder="Input field" name="price" value="<?php echo $pro['price']?>">
				</div>

				<div class="form-group">
					<label for="">Giảm giá</label>
					<input type="text" class="form-control"  placeholder="Input field" name="sale_price">
				</div>

				<div class="form-group">
					<label for="">Ảnh sản phẩm</label>
					<input type="file" class="form-control" placeholder="Input field" name="image" >
				</div>
				<div class="form-group">
					<img src="uploads/<?php echo $pro['image'] ?>" alt="" width= "200px">
				</div>

				<div class="form-group">
					<label for="">Mô tả</label>
					<input type="text" class="form-control"  placeholder="Input field" name="descrip" value="<?php echo $pro['descrip']?>">
				</div>
				<div class="form-group">
					<label for="">Trạng thái</label>
					<div class="radio">
						<label>
							<input type="radio" name="status" id="input" value="0" <?php echo ($pro['status']==0) ?'checked' : '' ?>>
							Ẩn
						</label>
						<label>
							<input type="radio" name="status" id="input" value="1" <?php echo ($pro['status']==1) ?'checked' : '' ?>>
							Hiện
						</label>
					</div>
				</div>

				<button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
			</form>
				</div>
			</div>
		</div>
	</div>
</section>
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
<?php 
include 'footer.php';
 ?>
