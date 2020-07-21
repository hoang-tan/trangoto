<?php 
$conn = mysqli_connect('localhost','root','','doanky1');
mysqli_set_charset($conn,'utf8');
ob_start();
include'header.php';

// check k co ng dùng đăng nhập vào phải đăng nhập ms đc vào
if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
}else{
	header('location: index.php');
}

$category =mysqli_query($conn,"SELECT * FROM category");

// xét để thêm 
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
	
	$data = mysqli_query($conn,"INSERT INTO product(name,cate_id,price,sale_price,image,descrip,status)
		VALUES('$name','$cate_id','$price','$sale_price','$file_name','$descrip','$status')");
	// var_dump($data);
	header('location: list-pro.php');
	}
	
	// $product = mysqli_query($conn,"SELECT * FROM product");
	// var_dump($product);
?>

<section class="container">
	<div class="row" style="margin-left: 250px">
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Thêm Sản phẩm</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" role="form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Tên sản phẩm</label>
					<input type="text" class="form-control" id="name" placeholder="Input field" name="name" onkeyup="ChangeToSlug()">
				</div>
				
				<div class="form-group">
					<label for="">slug</label>
					<input type="text" class="form-control" id="slug" placeholder="Input field" name="slug">
				</div>

				<div class="form-group">
					<label for="">Danh mục</label>
					<select name="cate_id" id="input" class="form-control" required="required">
						<option value="">____Danh Sách____</option>
						<?php foreach ($category as $key => $value) : ?>
						<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>

					<?php endforeach ?>
					</select>
				</div>

				<div class="form-group">
					<label for="">Giá sản phẩm</label>
					<input type="text" class="form-control" id="slug" placeholder="Input field" name="price">
				</div>

				<div class="form-group">
					<label for="">Giảm giá</label>
					<input type="text" class="form-control" id="slug" placeholder="Input field" name="sale_price">
				</div>

				<div class="form-group">
					<label for="">Ảnh sản phẩm</label>
					<input type="file" class="form-control" id="slug" placeholder="Input field" name="image">
				</div>

				<!-- <div class="form-group">
					<label for="">Mô tả</label>
					<input type="text" class="form-control" id="slug" placeholder="Input field" name="descrip">
				</div> -->
				
				<div class="form-group">
					<label for="textarea" class="col-sm-2 control-label">Mô tả</label>
					<div class="">
						<textarea name="descrip" id="textarea" class="form-control" rows="5" required="required"></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label for="">Trạng thái</label>
					<div class="radio">
						<label>
							<input type="radio" name="status" id="input" value="0" >
							Ẩn
						</label>
						<label>
							<input type="radio" name="status" id="input" value="1" checked="checked">
							Hiện
						</label>
					</div>
				</div>

				<button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
			</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
include'footer.php';
?>