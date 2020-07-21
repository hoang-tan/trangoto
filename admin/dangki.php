<?php 
include'../config_db/connect.php';

$err =[];
if(isset($_POST['name'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$rpassword = $_POST['rpassword'];


	if(empty($name)){
		$err['name'] = 'Bạn chưa nhập tên!';
	}
	if(empty($email)){
		$err['email'] = 'Bạn chưa nhập tài khoản!';
	}

	if(empty($password)){
		$err['password'] = 'Bạn chưa nhập mật khẩu!';
	}

	// so sánh 2 mật khẩu
	if($password != $rpassword){
		$err['rpassword'] = 'Mật khẩu nhập lại chưa đúng';
	}
	// var_dump(empty($err));

	// ktra lỗi hay không không lỗi thì thêm vào đb
	if(empty($err)){
		//mã hóa mk
		// password_hash(string, PASSWORD_DEFAULT)
		$pass = password_hash($password,PASSWORD_DEFAULT);
		// var_dump($pass);
		$sql = mysqli_query($conn,"INSERT INTO admin(name,email,password)VALUES('$name','$email','$pass')");

		header('location: index.php');
	}

	//ktra nếu dki đúng chuyển sang đăng nhập
	// if($sql != $err){
	// 	header('location: index.php');
	// }
}

// kiểm ra thông tin ng dùng nhập
	
	 


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
		<style>
			.has-error{
				color: red;
			}
		</style>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<form action="" method="POST" role="form">
						<legend>Đăng ký</legend>
					
						<div class="form-group">
							<label for="">name</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="name">
						<div class="has-error">
							<span><?php echo  (isset($err['name'])) ? $err['name'] : ''?></span>
						</div>
						
						</div>
						
						<div class="form-group">
							<label for="">email</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="email">
							<div class="has-error">
							<span><?php echo  (isset($err['email'])) ? $err['email'] : ''?></span>
						</div>
						</div>

						<div class="form-group">
							<label for="">password</label>
							<input type="password" class="form-control" id="" placeholder="Input field" name="password">
							<div class="has-error">
							<span><?php echo  (isset($err['password'])) ? $err['password'] : ''?></span>
						</div>
						</div>

						<div class="form-group">
							<label for="">Nhập lại password</label>
							<input type="password" class="form-control" id="" placeholder="Input field" name="rpassword">
							<div class="has-error">
							<span><?php echo  (isset($err['rpassword'])) ? $err['rpassword'] : ''?></span>
						</div>
						</div>
						
					
						<button type="submit" class="btn btn-primary">Đăng kí</button>
					</form>
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