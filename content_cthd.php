<?php
	if(isset($_GET['mahd'])) {
		$mahd = $_GET['mahd'];
		$sql = "SELECT xacnhan FROM hoadon WHERE mahd='$mahd'";
		$result = database::executeQuery($sql);
		$row = mysqli_fetch_array($result);
?>
<div class="admin1" style="background-image:url(IMG/white-wallpaper-14.jpg)">
<div class=content3>
	<h1 align="center">Chi tiết hóa đơn</h1>
	<h2 align="center"><?php echo $mahd;?></h2>
	<input style="margin: 0px 45%; font-size: 16px;" id="<?php echo $mahd;?>" type="button" value="<?php if($row['xacnhan']=="1") echo("Chưa liên lạc"); else if($row['xacnhan']=="2") echo("Chưa giao"); else echo("Đã giao")?>" <?php if($row['xacnhan']=="1") echo ("onClick=\"lienlac('$mahd');\""); else if($row['xacnhan']=="2") echo ("onClick=\"dagiao('$mahd');\"");?>>
	<table id="cthd">
		<tbody>
			<tr>
				<th>Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Tổng cộng</th>
			</tr>
<?php 
		$sql = "SELECT cthd.masp,tensp,cthd.gia,soluong FROM cthd,sanpham WHERE cthd.masp=sanpham.masp AND mahd='$mahd'";
		$result = database::executeQuery($sql);
		$tongtien = 0;
		if(mysqli_num_rows($result)<=0) header('Location: ordman.php');
		while($row = mysqli_fetch_array($result)) {
?>
			<tr>
				<td><a href="sanpham.php?masp=<?php echo $row['masp'];?>"><?php echo $row['masp'];?></a></td>
				<td><a href="sanpham.php?masp=<?php echo $row['masp'];?>"><?php echo $row['tensp'];?></a></td>
				<td align="right"><?php echo $row['gia'];?></td>
				<td align="right"><?php echo $row['soluong'];?></td>
				<td align="right"><?php echo $row['gia']*$row['soluong'];?></td>
				<?php $tongtien = $row['gia']*$row['soluong'];?>
			</tr>
<?php 	} ?>
			<tr>
				<td colspan="4"><b>Tổng Cổng: </b></td>
				<td align="right"><?php echo $tongtien;?></td>
			</tr>
		</tbody>
	</table>
</div>
</div>
<script>
<?php	if(phanquyen::quanlyhd($loainv)){ ?>	
	function lienlac(mahd){
		$.post("xuly_hoadon.php",{"action":1,"mahd":mahd},function(data){});
		document.getElementById(mahd).value = "Chưa giao";
		document.getElementById(mahd).onclick = function(){dagiao(mahd);}
	}
	function dagiao(mahd){
		$.post("xuly_hoadon.php",{"action":2,"mahd":mahd},function(data){});
		document.getElementById(mahd).value = "Đã giao";
		document.getElementById(mahd).onclick = function(){}
	}
<?php	} else { ?>
	function lienlac(mahd){
		alert("Bạn không đủ quyền hạn!!!");
	}
	function dagiao(mahd){
		alert("Bạn không đủ quyền hạn!!!");
	}
<?php 	} ?>
</script>
<?php
	} else 
		header('Location: ordman.php'); 
?>