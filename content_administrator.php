<div class="admin2" style="background-image:url(IMG/white-wallpaper-14.jpg)">
<?php 
	if(isset($_SESSION['admin'])) {
		$manv = $_SESSION['admin'];
		$sql = "SELECT loainv FROM nhanvien WHERE manv='$manv'";
		$result = database::executeQuery($sql);
		$row = mysqli_fetch_array($result);
		$loainv = $row['loainv'];
?>
	<div class=content2>
		<a class="admin" href="accman.php" rel="noopener noreferrer" onClick="return quyen1();">Quản lý tài khoản</a>
		<a class="admin" href="proman.php" rel="noopener noreferrer" onClick="return quyen2();">Quản lý kho hàng</a>
		<a class="admin" href="ordman.php" rel="noopener noreferrer" onClick="return quyen3();">Quản lý hóa đơn</a>
	</div>
</div>
<script>
	function quyen1(){
<?php	if(phanquyen::quanlytk($loainv)) { ?>
		return true;
<?php 	} else { ?>
		alert("Bạn không đủ quyền hạn!!!");
		return false;
<?php 	} ?>
	}
	function quyen2(){
<?php	if(phanquyen::quanlykh($loainv)) { ?>
		return true;
<?php 		} else { ?>
		alert("Bạn không đủ quyền hạn!!!");
		return false;
<?php 	} ?>
	}
	function quyen3(){
<?php	if(phanquyen::quanlyhd($loainv)) { ?>
		return true;
<?php 	} else { ?>
		alert("Bạn không đủ quyền hạn!!!");
		return false;
<?php 	} ?>
	}
</script>
<?php
	}
?>
