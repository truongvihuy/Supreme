
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
		if(phanquyen::quanlytk($loainv)){
			if(isset($_POST['action'])) {
				$action = $_POST['action'];
				switch ($action) {
					case 1: { // Đánh dấu user xấu hoặc bỏ đánh dấu xấu
						$makh = $_POST['makh'];
						$userxau = $_POST['userxau'];
						if($userxau=="true") {
							$sql = "UPDATE khachhang SET ghichu='1' WHERE makh='$makh'";
						} else {
							$sql = "UPDATE khachhang SET ghichu='' WHERE makh='$makh'";
						}
						database::executeQuery($sql);
						break;
					}
					case 2: { // Đăng kí
						$id = $_POST['text_username'];
						$name = $_POST['text_name'];
						$birth = $_POST['date'];
						$address = $_POST['text_address'];
						$email = $_POST['text_email'];
						$sdt = $_POST['text_sdt'];
						$loaitk = $_POST['loaitk'];
						
						if($id && $email && $sdt && $loaitk) {
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
					}
					case 3: {// Xóa tài khoản
						if(isset($_POST['manv'])) {
							$ma = $_POST['manv'];
							$sql = "DELETE FROM nhanvien WHERE manv='$ma'";
						} else {
							$ma = $_POST['makh'];
							$sql = "DELETE FROM khachhang WHERE makh='$ma'";
						}
						database::executeQuery($sql);
						break;
					}
				}
			}
		} else { header("Location: loi.php"); }
	} else {
		header('Location: admin.php');
	}
?>