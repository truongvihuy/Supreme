<main class=container1 style="background-image:url(IMG/bg.jpg)">
	<h2>Thanh toán</h2>
<?php
	if(!isset($_SESSION['cart'])) header('Location: cuahang.php');
	if(isset($_SESSION['name'])) {
		include("content_thongtintk.php");
?>
	
	<form id="mainForm" method="post" action="xuly_dathang.php">
		<input type="hidden" name="makh" value="<?php echo $_SESSION['name'];?>" >
		<span>Ghi chú: </span><textarea name='ghichu' type="text"></textarea>
		<input id="checkbox-dia-chi" type="checkbox" onChange="diachi();" > Chọn giao địa chỉ khác
		<div id="dia-chi" ></div>
<?php
	} else { 
?>
	<form id="mainForm" method="post" action="xuly_dathang.php" onSubmit="return check();">
		<span>Họ và tên:* </span><input type='text' name='hoten' value='' placeholder="Họ tên" required>
		<span>Địa chỉ:* </span><input type='text' name='diachi' value='' placeholder="Địa chỉ" required>
		<span>Email:* </span><input type='text' name='email' value='' placeholder="Email" required><div id='checkemail'>*</div>
		<span>Số điện thoại:* </span><input type='text' name='sdt' value='' placeholder="Số điện thoại" required><div id='checksdt'>*</div>
		<span>Ghi chú: </span><textarea name='ghichu' type="text" placeholder="Ghi chú"></textarea>
<?php } ?>
		<table id="giohang">
			<tr>
				<th>Sản phẩm</td>
				<th>Tổng cộng</td>
			</tr>
<?php
$tongtien = 0;
foreach($_SESSION['cart'] as $masp => $soluong) {
	if(isset($masp)){
		$sql = "SELECT tensp, gia FROM sanpham WHERE masp='$masp'";
		$result = database::executeQuery($sql);
		if(mysqli_num_rows($result)>0) {
?>
			<tr>
<?php		$row = mysqli_fetch_array($result); ?>
				<td style='padding-left: 50px;'><?php echo $row['tensp'];?><b> x <?php echo $soluong; ?></b></td>
				<td><p class="thanhtoan"><?php echo $row['gia']*$soluong;?></p></td>
<?php		$tongtien += ($row['gia']*$soluong); ?>
			</tr>
<?php	}
	}
} ?>		<tr>
				<td style="margin-top: 10px;font-size: 20px">Tổng cộng</td>
				<td style="font-size: 20px;"><b><?php echo $tongtien; ?></b></td>
			</tr>
		</table>
		<button type="submit">Đặt hàng</button>
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
		function diachi(){
			var x = document.getElementById("checkbox-dia-chi").checked;
			var temp = "";
			if(x===true)
				temp = "<span>Địa chỉ giao:* </span><input type='text' name='diachi' value='' required>"
			document.getElementById("dia-chi").innerHTML = temp;
			document.getElementById("checkbox-dia-chi").onchange = function() {diachi()};
		}
	</script>
	<style type="text/css">
		#checkhoten, #checkngaysinh, #checkdiachi, #checkemail, #checksdt {
			display: none;
			color: red;
		}
	</style>
</main>