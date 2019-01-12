<h1 style='color: white;padding: 50px 50px 0px 50px;'>Giỏ hàng</h1>
<?php	if(!isset($_SESSION['cart'])) { ?>
	<p style='color: white;margin: 20px 50px'>Hiện tại chưa có gì trong giỏ hàng.</p>
	<b><a href='cuahang.php' style='color: white;padding: 10px;background-color: #B80003;margin: 0px 50px' >Quay lại cửa hàng</a></b>
<?php	} else { ?>
	<table id="giohang">
		<tr>
			<td></td>
			<td style="width:  200px;padding-left: 50px;color: #FFFFFF;">Sản phẩm</td>
			<td style="width:  200px;padding-left: 50px;color: #FFFFFF;">Giá</td>
			<td style="width:  200px;padding-left: 50px;color: #FFFFFF;">Số lượng</td>
			<td style="width:  200px;padding-left: 50px;color: #FFFFFF;">Tổng cộng</td>
		</tr>
<?php
$tongtien = 0;
foreach($_SESSION['cart'] as $masp => $soluong) {
	if(isset($masp)){
		$sql = "SELECT tensp, gia, url1 FROM sanpham WHERE masp='$masp'";
		$result = database::executeQuery($sql);
		if(mysqli_num_rows($result)>0) {
?>
		<tr id='<?php echo $masp;?>'>
<?php		$row = mysqli_fetch_array($result); ?>
			<td style='width:  200px;padding-left: 20px;color: #FFFFFF;'><a href='sanpham.php?masp=<?php echo $masp;?>'><img style='height:100px;width:100px;' src='<?php echo $row['url1'];?>'></a></td>
			<td style='width:  200px;padding-left: 50px;color: #FFFFFF;'><a href='sanpham.php?masp=<?php echo $masp;?>'><?php echo $row['tensp'];?></a></td>
			<td style='width:  200px;padding-left: 50px;color: #FFFFFF;'><?php echo $row['gia'];?></td>
			<td style='width:  200px;padding-left: 40px;color: #FFFFFF;'>
				<input type="hidden" id="bien-sl_<?php echo $masp;?>" value="<?php echo $soluong;?>">
				<input type='number' value='<?php echo $soluong;?>' min='1' name='sl_<?php echo $masp;?>' id='sl_<?php echo $masp;?>' onChange="updateItem('<?php echo $masp;?>','<?php echo $row['gia'];?>');">
				<a href='javascript:void(0)' onClick="delItem('<?php echo $masp;?>','<?php echo $row['gia'];?>');"><img style='max-height:30px;max-width:30px;padding: 50 0;' src='IMG/close.png'></a>
			</td>
			<td style='width:  200px;padding-left: 50px;color: #FFFFFF;' id='tong-tien-1_<?php echo $masp;?>'><?php echo $row['gia']*$soluong;?></td>
<?php			$tongtien += ($row['gia']*$soluong); ?>
		</tr>
<?php	}
	}
} ?>
		<tr style="margin-left: 50px;">
			<td><input type="hidden" id="bien-tong-tien" value="<?php echo $tongtien;?>"></td>
			<td style="margin-top: 50px;height: 10px;font-size: 30px;color: #FFFFFF;" colspan="3">Tổng cộng</td>
			<td style="font-size: 30px; padding: 50px;color: #FFFFFF;"><b id='tong-tien'><?php echo $tongtien;?></b></td>
		</tr>
	</table>
	<a class='cart-btn' href='javascript:void(0)' onClick="delAll();" >Xóa toàn bộ giỏ hàng</a>
	<a class='cart-btn' href='thanhtoan.php' >Thanh toán</a>
<?php } ?>
<script>
	function updateItem(masp,gia){
		soluong = $("#sl_"+masp).val();
		$.post("xuly_giohang.php",{"action":4,"masp":masp, "num":soluong},function(data){});
		tongtien = $("#bien-tong-tien").val();
		sl = $("#bien-sl_"+masp).val();
		tongtien -= (parseInt(sl)*parseInt(gia));
		tongtien += (parseInt(soluong)*parseInt(gia));
		document.getElementById("tong-tien-1_"+masp).innerHTML = parseInt(soluong)*parseInt(gia);
		document.getElementById("bien-sl_"+masp).value = soluong;
		document.getElementById("tong-tien").innerHTML = tongtien;
		document.getElementById("bien-tong-tien").value = tongtien;
	}
	function delItem(masp,gia){
		$.post("xuly_giohang.php",{"action":2,"masp":masp},function(data){});
		document.getElementById(masp).style.display = 'none';
		soluong = $("#sl_"+masp).val();
		tongtien = $("#bien-tong-tien").val();
		tongtien -= (parseInt(soluong)*parseInt(gia));
		document.getElementById("tong-tien").innerHTML = tongtien;
		document.getElementById("bien-tong-tien").value = tongtien;
	}
	function delAll(){
		$.post("xuly_giohang.php",{"action":3},function(data){});
		window.location="giohang.php";
	}
</script>