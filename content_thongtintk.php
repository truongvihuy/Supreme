<link type="text/css" rel="stylesheet" href="CSS/tttk.css">
<div class="border">
<div class="border1">
<div class="border3">
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
		echo("<h1>".$row['ma']."</h1>");
		echo("<p><span>Họ và tên: </span>".$row['hoten']."</p>");
		echo("<p><span>Ngày sinh: </span>".$row['ngaysinh']."</p>");
		echo("<p><span>Địa chỉ: </span>".$row['diachi']."</p>");
		echo("<p><span>Email: </span>".$row['email']."</p>");
		echo("<p><span>Số điện thoại: </span>".$row['sdt']."</p>");
		echo("<h2><a href='chinhsuatk.php' style='color: red;'>Chỉnh sửa tài khoản</a></h2>");
		echo("<h3><a href='matkhau.php' style='color: red;'>Đổi mật khẩu</a></h3>");
	} else {
		header('Location: index.php');
	}
?>
</main>

</div>
</div></div>