<?php 
$conn = mysqli_connect('localhost','root','','doanky1');
mysqli_set_charset($conn,'utf8');
ob_start();
include'header.php';
$category = mysqli_query($conn,"SELECT * FROM category");
$sql = "SELECT product.*, category.name as Cate FROM product JOIN category ON product.cate_id = category.id";
// var_dump($sql);
$product = mysqli_query($conn,$sql);
echo '<br>';
// var_dump($product);
// die();
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
		

		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Danh sách danh mục</h3>
				</div>
				<div>
					<input type="text" name="search" placeholder="Tên sản phẩm" style="margin: 5px"> <button>Tìm kiếm</button> 
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover">
						<thead>
							<tr >
								<th style="text-align: center">STT</th>
								<th style="text-align: center">Tên sản phẩm</th>
								<th style="text-align: center">Loại sản phẩm</th>
								<th style="text-align: center">Giá sản phẩm</th>
								<th style="text-align: center">Giảm giá</th>
								<th style="text-align: center">Hình ảnh</th>
								<th style="text-align: center">Mô tả</th>
								<th style="text-align: center">Trạng thái</th>
								<th style="text-align: center">Tùy chỉnh</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($product as $key => $value) : ?>
							<tr>
								<td style="text-align: center"><?php echo $key+1 ?></td>
								<td style="text-align: center"><?php echo $value['name'] ?></td>
								<td style="text-align: center"><?php echo $value['Cate'] ?></td>
								<td style="text-align: center"><?php echo $value['price'] ?>$</td>
								<td style="text-align: center"><?php echo $value['sale_price'] ?></td>
								<td style="text-align: center"><img src="uploads/<?php echo $value['image'] ?>" alt="" width= "200px"></td>
								<td style="text-align: center"><?php echo $value['descrip'] ?></td>
								<td style="text-align: center"><?php echo ($value['status'] == 1) ? $checked = "Hiện" : $checked = "Ẩn" ?></td>
								<td style="text-align: center">
									<a href="deletepro.php?id=<?php echo $value['id']?>" class="btn btn-danger">Xóa</a>
									<a href="editpro.php?id=<?php echo $value['id']?>" class="btn btn-success">Sửa</a>
								</td>
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
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
