<?php
	session_start();
	require("database.php");
	require("cart.php");
	$sql = "";
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$mahd = "HD".date("y").date("m").date("d").date("H").date("i").date("s");
	if(isset($_POST['makh'])){
		$makh = $_POST['makh'];
			$sql = "SELECT hoten,diachi,email,sdt FROM khachhang WHERE makh='$makh'";
			$result = database::executeQuery($sql);
			$row = mysqli_fetch_array($result);
		$hoten = $row['hoten'];
		$ngayban = date("Y")."-".date("m")."-".date("d");
		if(isset($_POST['diachi'])) $diachigiao = $_POST['diachi'];
		else $diachigiao = $row['diachi'];
		$email = $row['email'];
		$sdt = $row['sdt'];
		$tongtien = 0;
		foreach($_SESSION['cart'] as $masp => $soluong) {
			if(isset($masp)) {
				$sql = "SELECT gia FROM sanpham WHERE masp='$masp'";
				$result = database::executeQuery($sql);
				$row = mysqli_fetch_array($result);
				$gia = $row['gia'];
				$sql = "INSERT INTO cthd (mahd,masp,gia,soluong) VALUES ('$mahd','$masp','$gia','$soluong')";
				database::executeQuery($sql);
				$tongtien += $soluong*$gia;
			}
		}
		$ghichu = $_POST['ghichu'];
		$sql = "INSERT INTO hoadon (mahd,makh,hoten,ngayban,diachigiao,email,sdt,tongtien,ghichu,xacnhan) VALUES ('$mahd','$makh','$hoten','$ngayban','$diachigiao','$email','$sdt','$tongtien','$ghichu','Chưa liên lạc')";
	} else {
		$hoten = $_POST['hoten'];
		$ngayban = date("Y")."-".date("m")."-".date("d");
		$diachigiao = $_POST['diachi'];
		$email = $_POST['email'];
		$sdt = $_POST['sdt'];
		$tongtien = 0;
		foreach($_SESSION['cart'] as $masp => $soluong) {
			if(isset($masp)) {
				$sql = "SELECT gia FROM sanpham WHERE masp='$masp'";
				$result = database::executeQuery($sql);
				$row = mysqli_fetch_array($result);
				$gia = $row['gia'];
				$sql = "INSERT INTO cthd (mahd,masp,gia,soluong) VALUES ('$mahd','$masp','$gia','$soluong')";
				database::executeQuery($sql);
				$tongtien += $soluong*$gia;
			}
		}
		$ghichu = $_POST['ghichu'];
		$sql = "INSERT INTO hoadon (mahd,hoten,ngayban,diachigiao,email,sdt,tongtien,ghichu,xacnhan) VALUES ('$mahd','$hoten','$ngayban','$diachigiao','$email','$sdt','$tongtien','$ghichu','1')";
	}
	database::executeQuery($sql);
	cart::removeAll();
	header('Location: cuahang.php');
?>