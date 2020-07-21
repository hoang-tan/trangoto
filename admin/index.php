<?php 

include'../config_db/connect.php';

// ktra xem có email k
if(isset($_POST['email'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	// ktra user này có trong ddb không thông qua id

	$sql = mysqli_query($conn,"SELECT * FROM admin WHERE email = '$email'");
	// echo '<pre>';
	// print_r($sql);
	$data = mysqli_fetch_assoc($sql);
	//  hàm ktra email có đúng hay k
	$checkemail = mysqli_num_rows($sql);

	// ktra nếu có
	if($checkemail == 1){
		// hiển thị mk trong đb
		// echo $data['password'];
		// echo '<br>';
		// // hiển thị mk nhập từ form
		// echo $password;
		// bỏ mã hóa pass trong db
		$check = password_verify($password,$data['password']);
		
		// nếu $check đúng chả về là true thì lưu vào session
		if($check){
			// lưu vào session tất cả thông tin nhập vào từ form đc lưu vào $data
			$_SESSION['user'] = $data;
			header('location: index2.php');
		}else{
			echo"Sai mật khẩu!";
		}

	}else{
		echo "Tài khoản không tồn tại!";
	}
	
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
		<!-- <style>
			@import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url(http://ginva.com/wp-content/uploads/2012/07/city-skyline-wallpapers-008.jpg);
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=button]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=button]:hover{
	opacity: 0.8;
}

.login input[type=button]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
		</style> -->
		<style>
			.col-md-5{
				background-color: white;
				border-bottom: 0px solid none;
				border-radius: 5px;
				height: 280px

			}
			.row{
				margin-top: 200px;
				margin-left: 400px;
				border-radius: 2px black;
			}
		</style>
	</head>
	<body style="background-color: pink ">
		<!-- div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Site<span>Random</span></div>
		</div>
		<br>
		<div class="login">
				<input type="text" placeholder="username" name="email"><br>
				<input type="password" placeholder="password" name="password"><br>
				
		</div> -->
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div>
			<form action="" method="POST" role="form">
				<!-- <legend><img src="images/" alt=""></legend> -->
				<legend style="text-align: center">Đăng nhập</legend>
			
				<div class="form-group">
					<label for="">email</label>
					<input type="text" class="form-control" id="" placeholder="Input field" name="email">
				</div>
			
			<div class="form-group">
					<label for="">pass</label>
					<input type="password" class="form-control" id="" placeholder="Input field" name="password">
				</div>
				
			
				<button type="submit" class="btn btn-primary" style="float: right">Login</button>
			</form>
		</div>
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