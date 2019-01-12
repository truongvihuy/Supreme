<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TEEN ĐÚ FASHION</title>
	<link rel="stylesheet" type="text/css" href="CSS/1.css">
	<script src="JS/jquery.min.js"></script>
<script type="text/javascript">
	function check(){
		var varcheck = document.form1;
		if(varcheck.text_username.value==="") {
			alert("Mời nhập tên đăng nhập");
			varcheck.text_username.focus();
			return false;
		}
		if(varcheck.text_sdt.value==="") {
			alert("Mời nhập số điện thoại");
			varcheck.text_sdt.focus();
			return false;
		}
		if(varcheck.loaitk.value===""){
			alert("Mời chọn loại tài khoản.");
			varcheck.loaitk.focus();
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
		
		return true;
	}
</script>
</head>
<body>
	<form method="POST" action="themadmin.php" name="form1" onSubmit="return check()">
		<div class="login1" >
			<h2>Tạo tài khoản</h2>
			<input name="text_username" placeholder="Tên tài khoản"  type="text" required><br>
			<b><div id="loi">Tên đăng nhập đã tồn tại</div></b>
			<input name="text_name" placeholder="Họ và tên"  type="text" required><br>
			<input name="date" placeholder="Ngày sinh" type="date" required><br>
			<input name="text_address" placeholder="Địa chỉ"  type="text" required><br>
			<input name="text_email" placeholder="Địa chỉ email" type="text" required><br>
			<input name="text_sdt" placeholder="Số Điện Thoại" type="text" required><br>
			<select name="loaitk" required >
				<option value="">Chọn loại tài khoản</option>
				<option value="1">Quản lý</option>
				<option value="2">Nhân viên bán hàng</option>
				<option value="3">Nhân viên quản kho</option>
			</select>
			<input class="button" type="submit" value="REGISTER"  name="log">
		</div>
	</form>
<?php 
	session_start();
	require("database.php");
	require("phanquyen.php");
	if(isset($_SESSION['admin'])){
		$manv = $_SESSION['admin'];
		$sql = "SELECT loainv FROM nhanvien WHERE manv='$manv'";
		$result = database::executeQuery($sql);
		$row = mysqli_fetch_array($result);
		$loainv = $row['loainv'];
		if(phanquyen::quanlytk($loainv)){
			if (isset($_POST['log']) ==TRUE) {
				$id = $_POST['text_username'];
				$name = $_POST['text_name'];
				$birth = $_POST['date'];
				$address = $_POST['text_address'];
				$email = $_POST['text_email'];
				$sdt = $_POST['text_sdt'];
				$loaitk = $_POST['loaitk'];
				$sql = "SELECT manv FROM nhanvien WHERE manv='$id'";
				$result = database::executeQuery($sql);
				if(mysqli_num_rows($result)>0) {
					echo('<script language="javascript">document.getElementById("loi").style.display = "block";</script>');
				} else {
					$sql = "INSERT INTO nhanvien (manv, hoten, ngaysinh, password, diachi, email, sdt, loainv) VALUES ('$id','$name','$birth',md5('000000'),'$address','$email','$sdt','$loaitk')";
					database::executeQuery($sql);
					echo('<script language="javascript">alert("Tài khoản đã được tạo.\nMật khẩu: 000000")</script>');
					header("Location: accman.php");
				}
			}
		} else {
			header('Location: loi.php');
		}
	} else {
		header('Location: admin.php');
	}
?>
</body>
</html>