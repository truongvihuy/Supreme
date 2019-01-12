<?php 
	session_start();
	if(isset($_SESSION['admin']) || isset($_SESSION['name'])) header ( 'Location: index.php' ); 
	require("database.php");
	// Nếu click vào nút Lưu Session
	if (isset($_POST['log']) =="Đăng nhập")
	{
		$user=$_POST['text_user'];
		$pass=$_POST['text_passwd'];
		//echo"$user $pass";
		$sql = "SELECT manv,password FROM nhanvien WHERE manv='$user' AND password=md5('$pass')";
		$result = database::executeQuery($sql);
		if(mysqli_num_rows($result)>0){
		// Lưu Session
			$_SESSION['admin'] = $user;
			header ( 'Location: administrator.php' );
		}
	}
?>
<html>
<head>
<meta charset="utf-8">
<title>TEEN ĐÚ FASHION</title>
	<link rel="stylesheet" type="text/css" href="CSS/loginad.css">
	<script src="JS/jquery.min.js"></script>
</head>
<body>
<form name="form1" action="" method="POST" onSubmit="return check()">
	<div class="login">
		<h2>Admin</h2>
		<span><b>Tên đăng nhập</b></span>
		<input name="text_user" placeholder="Tên đăng nhập"  type="text">
		<span><b>Mật khẩu</b></span>
		<input id="pw" name="text_passwd" placeholder="Mật khẩu" type="password">
		<p></p>
		<input class="button" type="submit" value="Đăng nhập"  name="log">
	</div>
</form>
</body>
</html>