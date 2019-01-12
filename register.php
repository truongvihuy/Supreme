<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TEEN ĐÚ FASHION</title>
<link rel="stylesheet" type="text/css" href="CSS/1.css">
<script type="text/javascript">
	function check(){
		var varcheck = document.form1;
		if(varcheck.text_username.value==="") {
			alert("Mời nhập tên đăng nhập");
			varcheck.text_username.focus();
			return false;
		}
		if(varcheck.text_passwd.value==="") {
			alert("Mời nhập mật khẩu");
			varcheck.text_passwd.focus();
			return false;
		}
		if(varcheck.confirm_passwd.value==="") {
			alert("Mời nhập lại mật khẩu");
			varcheck.confirm_passwd.focus();
			return false;	
		}
		if(varcheck.text_passwd.value!==varcheck.confirm_passwd.value) {	
			alert("Hai mật khẩu không trùng khớp");
			return false;
		}
		if(varcheck.text_sdt.value==="") {
			alert("Mời nhập số điện thoại");
			varcheck.text_sdt.focus();
			return false;
		}
		if(varcheck.text_email.value==="") {	
			alert("Mời nhập Email");
			varcheck.text_email.focus();
			return false;
		}
		var varchecksdt=/^0[198]+([\d]{8,9})$/
		if(!varchecksdt.test(varcheck.text_sdt.value)) {
			alert("Số điện thoại không hợp lệ !!!\n");
			return false;
		}
		var varcheckemail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!varcheckemail.test(varcheck.text_email.value)) {
			alert("Email chưa hợp lệ \n  Example@gmail.com");
           	return false;	
		}
		var checkpasswd=/([a-zA-Z0-9]{6,})/;
		if(!checkpasswd.test(varcheck.text_passwd.value)) {
			alert("Mật khẩu tối thiểu 6 kí tự");
			return false;
		}		
	}
</script>
	<script src="JS/jquery.min.js"></script>
</head>
<body>
	<form method="POST" action="register.php" name="form1" onSubmit="return check()">
		<div class="login" >
			<h2>Đăng Ký</h2>
			<span><b>Tên đăng nhập</b></span>
			<input name="text_username" placeholder="Tên tài khoản"  type="text" required value="<?php if(isset($_POST['log'])) echo $_POST['text_username'];?>">
			<b><div id="loi">Tên đăng nhập đã tồn tại</div></b><br/>
			<span><b>Mật khẩu</b></span>
			
			<input id="pw" name="text_passwd" placeholder="Mật khẩu" type="password" required>
			<input id="pw2" name="confirm_passwd" placeholder="Nhập lại mật khẩu" type="password" required>
			<br/>
			<span><b>Họ tên</b></span>
			<input name="text_name" placeholder="Họ và tên"  type="text" required value="<?php if(isset($_POST['log'])) echo $_POST['text_name'];?>"><br/>
			<span><b>Ngày sinh</b></span>
			<input name="date" placeholder="Ngày sinh" type="date" required value="<?php if(isset($_POST['log'])) echo $_POST['date'];?>"><br/>
			<span><b>Địa chỉ</b></span>
			<input name="text_address" placeholder="Địa chỉ"  type="text" required value="<?php if(isset($_POST['log'])) echo $_POST['text_address'];?>"><br/>
			<span><b>Email</b></span>
			<input name="text_email" placeholder="Địa chỉ email" type="text" required value="<?php if(isset($_POST['log'])) echo $_POST['text_email'];?>"><br/>
			<span><b>Số điện thoại</b></span>
			<input name="text_sdt" placeholder="Số Điện Thoại" type="text" required value="<?php if(isset($_POST['log'])) echo $_POST['text_sdt'];?>"><br/>
			<input class="button" type="submit" value="Tạo tài khoản"  name="log">
			<a class="forgot" href='index.php'>Đã có tài khoản</a>
		</div>
	</form> 
<?php 
	session_start();
	require("database.php");
	// Nếu click vào nút Lưu Session
	if(isset($_SESSION['admin'])||isset($_SESSION['name'])) header('Location: index.php');
	if (isset($_POST['log']) ==TRUE)
	{
		$id = $_POST['text_username'];
		$name = $_POST['text_name'];
		$birth = $_POST['date'];
		$address = $_POST['text_address'];
		$ps = $_POST['text_passwd'];
		$email = $_POST['text_email'];
		$sdt = $_POST['text_sdt'];
		
		if($id && $ps && $email && $sdt) {
			$sql = "SELECT makh FROM khachhang WHERE makh='$id'";
			$result = database::executeQuery($sql);

			if(mysqli_num_rows($result)>0) {
				echo('<script language="javascript">document.getElementById("loi").style.display = "block";</script>');
			}
			else {
				$sql = "INSERT INTO khachhang (makh, hoten,ngaysinh, password,diachi,email,sdt) VALUES ('$id','$name','$birth',md5('$ps'),'$address','$email','$sdt')";
				database::executeQuery($sql);
				// Lưu Session
				$_SESSION['name'] = $_REQUEST['text_username'];
				header("Location: index.php");
			}
		}
	}
?>
</body>
</html>