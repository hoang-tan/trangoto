<?php 

include'header.php';

// sét nếu đăng nhập user rồi thì vào đc k thì về đăng nhập
if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
}else{
	header('location: index.php');
}
// ktra xem id có hay không
if(isset($_GET['id'])){
	$id = $_GET['id'];
	// truy vân đến id của sp cần sửa
	$cate = mysqli_query($conn,"SELECT * FROM category WHERE id = '$id'");
	// truy đổi về mảng
	$data = mysqli_fetch_assoc($cate);
	// var_dump($data);
	// die();
}

// sửa sp
if(isset($_POST['name'])){
	$name = $_POST['name'];
	$slug = $_POST['slug'];
	$status = $_POST['status'];
	// var_dump($_POST['name']);
	// die();
	$abc= mysqli_query($conn,"UPDATE category SET name='$name', slug='$slug',status='$status' WHERE id = '$id'");
	// var_dump($abc);
	// die();
	header('location: category.php');
}

?>

<section class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Thêm mới</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" role="form">
				<div class="form-group">
					<label for="">Tên danh mục</label>
					<input type="text" class="form-control" id="name" placeholder="Input field" name="name" onkeyup="ChangeToSlug()" value="<?php echo $data['name'] ?>">
				</div>
				
				<div class="form-group">
					<label for="">slug</label>
					<input type="text" class="form-control" id="slug" placeholder="Input field" name="slug" value="<?php echo $data['slug'] ?>">
				</div>
				
				
				<div class="form-group">
					<label for="">Trạng thái</label>
					<div class="radio">
						<label>
							<input type="radio" name="status" id="input" value="0" <?php echo ($data['status']==0) ?'checked' : '' ?> >
							Ẩn
						</label>
						<label>
							<input type="radio" name="status" id="input" value="1" <?php echo ($data['status']==1) ?'checked' : '' ?>>
							Hiện
						</label>
					</div>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
include'footer.php';
?>