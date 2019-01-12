<div class="admin1" style="background-image:url(IMG/white-wallpaper-14.jpg)">
<div class=content3>
<div>
	<h1 align="center"> Quản lý kho hàng <a href="themsanpham.php" title="Thêm sản phẩm"><img src="IMG/add.png"></a></h1>
	<div style="clear: both;">
		<table id="het-hang" style="width: 1100px;">
			<tr>
				<td></td>
				<td>Mã sản phẩm</td>
				<td>Tên sản phẩm</td>
				<td>Phân loại</td>
				<td>Hãng</td>
				<td>Ngày nhập</td>
				<td>Số lượng tồn</td>
				<td>Số lượng bán</td>
				<td>Giá</td>
				<td>Thông tin sản phẩm</td>
			</tr>
<?php
		$sql = "SELECT * FROM sanpham,loaisanpham WHERE sanpham.malsp=loaisanpham.malsp ";
		if(isset($_GET['malsp'])){
			$malsp = $_GET['malsp'];
			$sql = $sql."AND sanpham.malsp='$malsp' ";
		} else {
			if(isset($_GET['phanloai'])){
				$phanloai = $_GET['phanloai'];
				$sql = $sql."AND sanpham.malsp LIKE '$phanloai%' ";
			} else {
				if(isset($_GET['tensp'])){
					$search = $_GET['tensp'];
					$sql = $sql."AND tensp LIKE '%$search%'";
				}
			}
		}
		$result = database::executeQuery($sql);
		while($row = mysqli_fetch_array($result)) {
?>
			<tr id="<?php echo $row['masp'];?>">
				<td>
					<a href="chinhsuasp.php?masp=<?php echo $row['masp'];?>">Sửa</a>
					<a onClick="delProduct('<?php echo $row['masp'];?>','<?php echo $row['tensp'];?>')">Xóa</a>
				</td>
				<td><a href="sanpham.php?masp=<?php echo($row['masp']);?>"><?php echo $row['masp'];?></a></td>
				<td><a href="sanpham.php?masp=<?php echo($row['masp']); ?>"><?php echo $row['tensp'];?></a></td>
				<td><a href="cuahang.php?malsp=<?php echo($row['malsp']);?>"><?php echo($row['tenlsp']." - ".$row['phanloai']);?></a></td>
				<td><?php echo $row['hang'];?></td>
				<td><?php echo $row['ngaynhap'];?></td>
				<td align="right"><b><i id="<?php echo $row['masp'];?>" ><?php echo $row['soluongton'];?></i></b></td>
				<td align="right"><?php echo $row['soluongban']?></td>
				<td align="right"><?php echo $row['gia'];?></td>
				<td><?php echo $row['ttsp']?></td>
			</tr>
<?php 	} ?>
		</table>
	</div>
</div>
</div>
<script>
<?php
		$manv = $_SESSION['admin'];
		$sql = "SELECT loainv FROM nhanvien WHERE manv='$manv'";
		$result = database::executeQuery($sql);
		$row = mysqli_fetch_array($result);
		$loainv = $row['loainv'];
		if(phanquyen::quanlykh($loainv)){
?>
	function delProduct(masp,tensp){
		var r = confirm("Bạn có chắc chắn muốn xóa "+tensp+" không ?");
		if(r === true){
			$.post("xuly_sanpham.php",{"action":2,"masp":masp},function(data){});
			alert("Đã xóa thành công!!!");
			document.getElementById(masp).style.display = "none";
		}
	}
<?php	} else { ?>
	function delProduct(masp){
		alert("Bạn không đủ quyền hạn!!!");
	}
<?php	} ?>
</script>