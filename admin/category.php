<?php 
include'header.php';

// check k co ng dùng đăng nhập vào phải đăng nhập ms đc vào
if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
}else{
	header('location: index.php');
}


// ktra xem name đc khai báo chưa
if(isset($_POST['name'])){
	$name = $_POST['name'];
	$slug = $_POST['slug'];
	$status = $_POST['status'];

// truy vấn để thêm danh mục
	mysqli_query($conn,"INSERT INTO category(name,slug,status)VALUES('$name','$slug','$status')");
}

$cate = mysqli_query($conn,'SELECT * FROM category');

?>

<section class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Thêm mới</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" role="form">
				<div class="form-group">
					<label for="">Tên danh mục</label>
					<input type="text" class="form-control" id="name" placeholder="Input field" name="name" onkeyup="ChangeToSlug()">
				</div>
				
				<div class="form-group">
					<label for="">slug</label>
					<input type="text" class="form-control" id="slug" placeholder="Input field" name="slug">
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

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
				</div>
			</div>
		</div>

		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Danh sách danh mục</h3>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover">
						<thead>
							<tr >
								<th style="text-align: center">STT</th>
								<th style="text-align: center">Tên danh mục</th>
								<th style="text-align: center">Trạng thái</th>
								<th style="text-align: center">Tùy chọn</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($cate as $key => $value) : ?>
							<tr>
								<td style="text-align: center"><?php echo $key+1 ?></td>
								<td style="text-align: center"><?php echo $value['name'] ?></td>
								<td style="text-align: center"><?php echo ($value['status'] == 1) ? $checked = "Hiện" : $checked = "Ẩn" ?></td>
								<td style="text-align: center">
									<a href="delete.php?id=<?php echo $value['id']?>" class="btn btn-danger">Xóa</a>
									<a href="edit.php?id=<?php echo $value['id']?>" class="btn btn-success">Sửa</a>
								</td>
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
include'footer.php';
?>