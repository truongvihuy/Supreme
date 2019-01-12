<div class="admin1" style="background-image:url(IMG/white-wallpaper-14.jpg)">
<div class=content3>
<div>
	<h1 align="center"> Quản lý kho hàng <a href="themsanpham.php" title="Thêm sản phẩm"><img src="IMG/add.png"></a></h1>
<?php 
	// Tổng sản phẩm
	$sql = "SELECT COUNT(masp) AS tong FROM sanpham";
	$result = database::executeQuery($sql);
	$row = mysqli_fetch_array($result);
	$tong = $row['tong'];
?>
	<a align="center" style="width: 100%;" href="productman.php"><p><span>Số lượng sản phẩm: </span><?php echo $tong; ?></p></a>
<?php
	// Số lượng sản phẩm sắp hết hàng
	$sql = "SELECT COUNT(masp) AS tong FROM sanpham WHERE soluongton<10 ";
	$result = database::executeQuery($sql);
	$row = mysqli_fetch_array($result);
	$tong = $row['tong'];
?>
	<a align="center" style="width: 100%;" href="#het-hang"><p><span>Sản phẩm sắp hết (hết hàng): </span><?php echo $tong; ?></p></a>

	<div class="loaisp">
		<h3 align="center"><a href="productman.php?phanloai=B">Nam</a></h3>
		<ul>
<?php
	$sql = "SELECT * FROM loaisanpham WHERE malsp LIKE 'B%'";
	$result = database::executeQuery($sql);
	while($row = mysqli_fetch_array($result)){
		$sql = "SELECT COUNT('masp') AS tong FROM sanpham WHERE malsp='".$row['malsp']."'";
		$result1 = database::executeQuery($sql);
		$row1 = mysqli_fetch_array($result1);
		echo("<li><a href='productman.php?malsp=".$row['malsp']."'><span>".$row['tenlsp'].": </span>".$row1['tong']."</a></li>");
	}
?>
		</ul>
	</div>
	<div class="loaisp">
		<h3 align="center"><a href="productman.php?phanloai=G">Nữ</a></h3>
		<ul>
<?php
	$sql = "SELECT * FROM loaisanpham WHERE malsp LIKE 'G%'";
	$result = database::executeQuery($sql);
	while($row = mysqli_fetch_array($result)){
		$sql = "SELECT COUNT('masp') AS tong FROM sanpham WHERE malsp='".$row['malsp']."'";
		$result1 = database::executeQuery($sql);
		$row1 = mysqli_fetch_array($result1);
		echo("<li><a href='productman.php?malsp=".$row['malsp']."'><span>".$row['tenlsp'].": </span>".$row1['tong']."</a></li>");
	}
?>
		</ul>
	</div>
	<div class="loaisp">
		<h3 align="center"><a href="productman.php?phanloai=P">Phụ kiện</a></h3>
		<ul>
<?php
	$sql = "SELECT * FROM loaisanpham WHERE malsp LIKE 'P%'";
	$result = database::executeQuery($sql);
	while($row = mysqli_fetch_array($result)){
		$sql = "SELECT COUNT('masp') AS tong FROM sanpham WHERE malsp='".$row['malsp']."'";
		$result1 = database::executeQuery($sql);
		$row1 = mysqli_fetch_array($result1);
		echo("<li><a href='productman.php?malsp=".$row['malsp']."'><span>".$row['tenlsp'].": </span>".$row1['tong']."</a></li>");
	}
?>
		</ul>
	</div>
</div>

<?php 
	$sql = "SELECT masp,sanpham.malsp,tenlsp,phanloai,tensp,ngaynhap,soluongton,gia FROM sanpham,loaisanpham WHERE soluongton<10 AND sanpham.malsp=loaisanpham.malsp ORDER BY soluongton ";
	$result = database::executeQuery($sql);
	if(mysqli_num_rows($result)>0) {
?>
<div style="clear: both; text-align: center;	">
	<table id="het-hang">
		<tr style="text-align: center;">
			<td>Mã sản phẩm</td>
			<td>Phân loại</td>
			<td>Tên sản phẩm</td>
			<td>Ngày nhập</td>
			<td>Số lượng tồn</td>
			<td>Giá</td>
			<td>Số lượng thêm:</td>
		</tr>
<?php
		while($row = mysqli_fetch_array($result)) {
?>
		<tr>	
			<td style="width: 150px;"><a href="sanpham.php?masp=<?php echo($row['masp']);?>"><?php echo $row['masp'];?></a></td>
			<td style="width: 150px;"><a href="cuahang.php?malsp=<?php echo($row['malsp']);?>"><?php echo($row['tenlsp']." - ".$row['phanloai']);?></a></td>
			<td style="width: 200px;"><a href="sanpham.php?masp=<?php echo($row['masp']); ?>"><?php echo $row['tensp'];?></a></td>
			<td style="width: 150px;"><?php echo $row['ngaynhap'];?></td>
			<td style="width: 150px;"><b><i id="<?php echo $row['masp'];?>" ><?php echo $row['soluongton'];?></i></b></td>
			<td style="width: 150px;"><?php echo $row['gia'];?></td>
			<td style="width: 100px;">
				<input type="number" min='0' name='sl_<?php echo $row['masp'];?>' id='sl_<?php echo $row['masp'];?>' >
				<span style="background:#BF0003;color:#FFFFFF; border: 2px solid #FF1E22;"><a href='javascript:void(0)' onClick="themhang('<?php echo $row['masp'];?>','<?php echo $row['soluongton'];?>');" >Thêm hàng</a></span>
			
			</td>
		</tr>
<?php 	} ?>
	</table>
</div>
<?php } ?>
<script>
	function themhang(masp,slt){
		soluongthem = $("#sl_"+masp).val();
		$.post("xuly_sanpham.php",{"action":4,"masp":masp,"soluong":soluongthem},function(data){});
		soluongthem = parseInt(soluongthem) + parseInt(slt);
		document.getElementById(masp).innerHTML = soluongthem;
	}
</script>
</div>
</div>