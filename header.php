<div id="header">
	<div class="top">
		<div id="main-header">
			<div class="container">
				<div class="main-header">
					<div class="main-menu-wrapper">
						<ul>
							<li><a title="Trang chủ" href="index.php">Trang chủ</a></li>
<?php	ob_start(); 
		include("menungang.php");
		if ( !isset($_SESSION['name']) && !isset($_SESSION['admin'])){	
			include("dangnhap.php");
		} else {
?>							<li class="menu-ngang"><a title="Tài khoản"><img src="IMG/round-account-button-with-user-inside.png"></a>
								<ul class="menu-ngang-level-1">
									<li><a title="Thông tin cá nhân" href="thongtintk.php"><img src="IMG/account.png"></a></li><br/>
									<li><a title="Đăng xuất" href="xuly_dangxuat.php"><img src="IMG/logout.png"></a></li>
								</ul>
							</li>
<?php	} 
		if(isset($_SESSION['admin'])) { 
?>
							<li class="menu-ngang"><a title="Trang quản lí" href="administrator.php"><img src="IMG/list.png"></a>
								<ul class="menu-ngang-level-1">
									<li><a title="Quản lý kho hàng" href="proman.php" onClick="return quyen2();"><img src="IMG/shirt.png"></a></li><br/>
									<li><a title="Quản lý đơn hàng" href="ordman.php" onClick="return quyen3();"><img src="IMG/online-shop.png"></a></li><br/>
									<li><a title="Thông tin tài khoản" href="accman.php" onClick="return quyen1();"><img src="IMG/users-group.png"></a></li>
								</ul>
							</li>
<?php	} else { ?>
							<li><a title="Giỏ hàng" href="giohang.php"><img src="IMG/001-commerce.png"></a></li>
<?php	} ?>
							<li>
								<form method="post" action="xuly_timkiem.php">
                                <div id="main-menu-wrapper"><input type="search" name="search" placeholder="Search.."></div>
								</form>
							</li>
						</ul> 
					</div>
					<div class="row"> 
						<a href="index.php"> 
							<img src="IMG/829d15f2c100855d085e46ebe3d9569a.png">
							<script type="text/javascript">
								$(document).ready(function(){
								'use strict';
								$(window).scroll(function(){
									$(".row").css("opacity", 1 - $(window).scrollTop() / $('.row').height());
									});
								});
							</script>
						</a>	
					</div>			
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	require("phanquyen.php");
	if(isset($_SESSION['admin'])) {
		$manv = $_SESSION['admin'];
		$sql = "SELECT loainv FROM nhanvien WHERE manv='$manv'";
		$result = database::executeQuery($sql);
		$row = mysqli_fetch_array($result);
		$loainv = $row['loainv'];
?>
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
<?php 	} else { ?>
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