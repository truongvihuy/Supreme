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
		if(varcheck.old_passwd.value==="") {
			alert("Mời nhập mật khẩu");
			varcheck.text_passwd.focus();
			return false;
		}
		if(varcheck.text_passwd.value==="") {
			alert("Mời nhập mật khẩu mới");
			varcheck.text_passwd.focus();
			return false;
		}
		if(varcheck.confirm_passwd.value==="") {
			alert("Mời nhập lại mật khẩu mới");
			varcheck.confirm_passwd.focus();
			return false;	
		}
		if(varcheck.text_passwd.value!==varcheck.confirm_passwd.value) {	
			alert("Hai mật khẩu không trùng khớp");
			return false;
		}
		var checkpasswd=/([a-zA-Z0-9]{6,})/;
		if(!checkpasswd.test(varcheck.text_passwd.value)) {
			alert("Mật khẩu tối thiểu 6 kí tự");
			return false;
		}
	}
</script>
</head>
<?php 
	session_start();
	
	if(isset($_SESSION['admin']) || isset($_SESSION['name'])){
		if(isset($_SESSION['admin'])) $user = $_SESSION['admin']; 
		else $user = $_SESSION['name'];
		
		if (isset($_POST['log']) ==TRUE){
			require("database.php");
			$sql = "";$sql1 = "";
			$oldpw = $_POST['old_passwd'];
			$newpw = $_POST['text_passwd'];
			$confpw = $_POST['confirm_passwd'];
			
			if(isset($_SESSION['admin'])){
				$sql = "SELECT password FROM nhanvien WHERE manv='$user' AND password=md5('$oldpw')";
				$sql1 = "UPDATE nhanvien SET password=md5('$newpw') WHERE manv='$user'";
			} else {
				$sql = "SELECT password FROM khachhang WHERE makh='$user' AND password=md5('$oldpw')";
				$sql1 = "UPDATE khachhang SET password=md5('$newpw') WHERE makh='$user'";
			}
			$result = database::executeQuery($sql);
			if(mysqli_num_rows($result)>0){
				database::executeQuery($sql1);
				header("Location: thongtintk.php");
			} else {
				echo("<script>alert('Nhập sai mật khẩu.');</script>");
			}
		}
	} else ('Location: index.php');
?>
<body>
	<form method="POST" action="matkhau.php" name="form1" onSubmit="return check()">
		<div class="login" >
			<h2>Đổi mật khẩu</h2>
			<h3><?php echo $user;?></h3>
			<input id="pw" name="old_passwd" placeholder="Nhập lại mật khẩu" type="password" required>
			<input id="pw" name="text_passwd" placeholder="Mật khẩu mới" type="password" required>
			<input id="pw" name="confirm_passwd" placeholder="Nhập lại mật khẩu mới" type="password" required>
			<input class="button" type="submit" value="REGISTER"  name="log">
		</div>
	</form>
</body>
</html>