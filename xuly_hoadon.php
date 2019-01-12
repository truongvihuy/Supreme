<?php
	session_start();
	require("database.php");
	require("product.php");
	require("phanquyen.php");
	if(isset($_SESSION['admin'])){
		$manv = $_SESSION['admin'];
		$sql = "SELECT loainv FROM nhanvien WHERE manv='$manv'";
		$result = database::executeQuery($sql);
		$row = mysqli_fetch_array($result);
		$loainv = $row['loainv'];
		if(phanquyen::quanlyhd($loainv)){
			$action = $_POST['action'];
			switch ($action) {
				case '1': {
					$mahd = $_POST['mahd'];
					$sql = "UPDATE hoadon SET xacnhan='2' WHERE mahd='$mahd'";
					database::executeQuery($sql);
					break;
				}
				case '2': {
					$mahd = $_POST['mahd'];
					$sql = "SELECT soluongton, soluongban, soluong, cthd.masp FROM cthd, sanpham WHERE cthd.masp=sanpham.masp";
					$result = database::executeQuery($sql);
					while($row = mysqli_fetch_array($result)) {
						$soluongton = $row['soluongton'] - $row['soluong'];
						$soluongban = $row['soluongban'] + $row['soluong'];
						$masp = $row['masp'];
						$sql = "UPDATE sanpham SET soluongton='$soluongton',soluongban='$soluongban' WHERE masp = '$masp'";
						database::executeQuery($sql);
					}
					$sql = "UPDATE hoadon SET xacnhan='3' WHERE mahd='$mahd'";
					database::executeQuery($sql);
					break;
				}
			}
		} else { header("Location: loi.php"); }
	} else {
		header('Location: admin.php');
	}
?>