<?php
class product{
	public static function updateifProduct($masp,$malsp,$tensp,$hang,$soluongton,$gia,$ttsp){
		$sql = "UPDATE sanpham SET malsp='$malsp', tensp='$tensp',soluongton='$soluongton',gia='$gia',ttsp='$ttsp' WHERE masp = '$masp'";
		database::executeQuery($sql);
	}
	public static function updateProduct($masp,$soluongton){
		$sql = "UPDATE sanpham SET soluongton='$soluongton' WHERE masp = '$masp'";
		database::executeQuery($sql);
	}
	public static function removeProduct($masp){
		$sql = "DELETE FROM sanpham WHERE masp='$masp'";
		database::executeQuery($sql);
	}
	public static function addProduct($masp,$malsp,$tensp,$hang,$soluongton,$gia,$ttsp,$ngaynhap,$url1,$url2){
		$sql = "INSERT INTO sanpham (masp, malsp, tensp, hang, soluongton, soluongban, gia, ttsp, ngaynhap, url1, url2) VALUES ('$masp','$malsp','$tensp','$hang','$soluongton',0,'$gia','$ttsp','$ngaynhap','$url1','$url2')";
		database::executeQuery($sql);
	}
}
?>