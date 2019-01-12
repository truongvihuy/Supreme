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
		if(phanquyen::quanlykh($loainv)){
			if(isset($_POST['action'])) {
				$action = $_POST['action'];
				switch ($action) {
					case '1': { // Thêm sản phẩm
						// Lấy các biến
						date_default_timezone_set("Asia/Ho_Chi_Minh");
						$masp = "SP".date("y").date("m").date("d").date("H").date("i").date("s");
						$malsp = $_POST['malsp'];
						$name = $_POST['text_name'];	
						$hang = $_POST['text_hang'];
						$sl = $_POST['soluong'];
						$gia = $_POST['gia'];
						$if = $_POST['text_info'];
						$ngaynhap = date("Y")."-".date("m")."-".date("d");
						$anh = $_FILES["image_url"]["name"];
						//if(isset($_FILES["image_url"])) echo "Có";
						// Di chuyển ảnh đến thư mục
						$tmp_name = $_FILES["image_url"]["tmp_name"];
						$fldimageurl = "SP/". $_FILES["image_url"]["name"];
						move_uploaded_file($tmp_name, $fldimageurl);
						rename($fldimageurl,"SP/".$masp."_1.jpg");
						$fldimageurl = "SP/".$masp."_1.jpg";
						//echo($fldimageurl);
						//echo($_FILES["image_url"]["name"]);
						$tmp_name = $_FILES["image_url1"]["tmp_name"];
						$fldimageurl1 = "SP/". $_FILES["image_url1"]["name"];
						move_uploaded_file($tmp_name, $fldimageurl1);
						rename($fldimageurl1,"SP/".$masp."_2.jpg");
						$fldimageurl1 = "SP/".$masp."_2.jpg";
						//echo($fldimageurl1);
						//echo($_FILES["image_url1"]["name"]);
						product::addProduct($masp,$malsp,$name,$hang,$sl,$gia,$if,$ngaynhap,$fldimageurl,$fldimageurl1);
						break;
					}
					case '2': { // Xóa sản phẩm
						$masp = $_POST['masp'];
						$sql = "SELECT url1,url2 FROM sanpham WHERE masp='$masp'";
						$result = database::executeQuery($sql);
						$row = mysqli_fetch_array($result);
						unlink($row['url1']);
						unlink($row['url2']);
						product::removeProduct($masp);
						break;
					}
					case '3': { // Chỉnh sửa sản phẩm
						$masp = $_POST['masp'];
						$malsp = $_POST['malsp'];
						$name = $_POST['tensp'];	
						$hang = $_POST['hang'];
						$sl = $_POST['soluong'];
						$gia = $_POST['gia'];
						$if = $_POST['ttsp'];
						product::updateifProduct($masp,$malsp,$name,$hang,$sl,$gia,$if);
						break;
					}
					case '4': { // Nhập thêm hàng
						$masp = $_POST['masp'];
						$sl = $_POST['soluong'];
						$sql = "SELECT soluongton FROM sanpham WHERE masp='$masp'";
						$result = database::executeQuery($sql);
						$row = mysqli_fetch_array($result);
						$sl = $sl + $row['soluongton'];
						product::updateProduct($masp,$sl);
						break;
					}
				}
				header('Location: sanpham.php?masp='.$masp);
			}
		} else { header("Location: loi.php"); }
	} else {
		header('Location: admin.php');
	}
?>
