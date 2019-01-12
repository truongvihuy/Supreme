<link type="text/css" rel="stylesheet" href="CSS/cstttk.css">
<div class="border">
<div class="border1">
<main class=container1>
<?php
	if(isset($_SESSION['admin']) || isset($_SESSION['name'])) {
		if(isset($_SESSION['admin'])) {
			$user = $_SESSION['admin'];
			$sql = "SELECT manv AS ma, hoten, ngaysinh, diachi, email,sdt fROM nhanvien WHERE manv='$user'";
		} else {
			$user = $_SESSION['name'];
			$sql = "SELECT makh AS ma, hoten, ngaysinh, diachi, email,sdt fROM khachhang WHERE makh='$user'";
		}
		$result = database::executeQuery($sql);
		$row = mysqli_fetch_array($result);
?>
	<form id="mainForm" method="post" action="xuly_taikhoan.php" onSubmit="return check();">
		<h1><?php echo $row['ma'];?></h1>
		<span style="margin-left: 65px">Họ và tên: </span><input type='text' name='hoten' value='<?php echo $row['hoten'];?>' required>
		<span style="margin-left: 10px">Ngày sinh: </span><input type='date' name='ngaysinh' value='<?php echo $row['ngaysinh'];?>' required></br>	
		<span style="margin-left: 90px">Địa chỉ: </span><input type='text' name='diachi' value='<?php echo $row['diachi'];?>' required>
		<span style="margin-left: 55px">Email: </span><input type='text' name='email' value='<?php echo $row['email'];?>' required><div id='checkemail'>*</div><br>
		<span style="margin-left: 25px;">Số điện thoại: </span><input type='text' name='sdt' value='<?php echo $row['sdt'];?>' required><div id='checksdt'>*</div>
		<input type="submit" style="margin-left: 125px;" value="Lưu"></input></br></br></br>
	</form>
	<script type="text/javascript">
		function check(){
			var varchar = document.getElementById("mainForm");
			var flag = true;
			// Check email
			temp = varchar.email.value;
			pattern = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
			if(!temp.match(pattern)){
				document.getElementById("checkemail").style.display = 'block';
				flag = false;
			} else document.getElementById("checkemail").style.display = 'none';
			// Check số điện thoại
			temp = varchar.sdt.value;
			pattern = /^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/;
			if(!temp.match(pattern)){
				document.getElementById("checksdt").style.display = 'block';
				flag = false;
			} else document.getElementById("checksdt").style.display = 'none';
			return flag;
		}
	</script>
	<style type="text/css">
		#checkhoten, #checkngaysinh, #checkdiachi, #checkemail, #checksdt {
			display: none;
			color: red;
		}
	</style>
<?php
	}
?>
</main>
</div>
</div>