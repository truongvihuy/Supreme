<?php
	require("database.php");
	session_start();
	$hoten = $_POST['hoten'];
	$ngaysinh = $_POST['ngaysinh'];
	$diachi = $_POST['diachi'];
	$email = $_POST['email'];
	$sdt = $_POST['sdt'];

	if(isset($_SESSION['name'])) {
		$user = $_SESSION['name'];
		$sql = "UPDATE khachhang SET hoten = '$hoten', ngaysinh = '$ngaysinh', diachi = '$diachi', email = '$email', sdt = '$sdt' WHERE makh = '$user'";
	} else {
		$user = $_SESSION['admin'];
		$sql = "UPDATE nhanvien SET hoten = '$hoten', ngaysinh = '$ngaysinh', diachi = '$diachi', email = '$email', sdt = '$sdt' WHERE manv = '$user'";
	}
	$result = database::executeQuery($sql);
	header("Location: thongtintk.php");
?>