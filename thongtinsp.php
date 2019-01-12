<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8?/>
<script type="text/javascript">
	$(document).ready(function() {
	$('.color-choose input').on('click', function() {
	  var headphonesColor = $(this).attr('data-image');
	  $('.active').removeClass('active');
	  $('.left-column img[data-image = ' + headphonesColor + ']').addClass('active');
	  $(this).addClass('active');
		});
	});
</script>

<main class="hihi">
<?php
if(isset($_GET['masp'])) {
	$masp = $_GET['masp'];
	$sql = "SELECT masp, sanpham.malsp, tenlsp, tensp, ttsp, hang, soluongton, gia, url1, url2 FROM loaisanpham,sanpham WHERE masp='$masp' AND sanpham.malsp=loaisanpham.malsp";
	$result = database::executeQuery($sql);
	if(mysqli_num_rows($result)>0) {
		$row = mysqli_fetch_array($result);
?>
	<div class="left-column" id="left-column">
		<img class='hinh-1' style='float:inherit;max-height: 90%;' src='<?php echo $row['url1'];?>'>
	</div>
	<div class="right-column">
    	<div class="product-description">
			<a style='text-decoration: none;' href='cuahang.php?malsp=<?php echo $row['malsp'];?>'><span><?php echo $row['tenlsp'];?></span></a><hr/>
			<h1><?php echo $row['tensp'];?></h1>
			<p><?php echo $row['ttsp'];?></p>
			<p><?php echo $row['hang'];?></p>
			<img class='hinh-nho-1' style='max-width:100px;max-height: 100px;padding-left:10px;' src='<?php echo $row['url1'];?>' onMouseOver="hinh1();">
			<img class='hinh-nho-2' style='max-width:100px;max-height: 100px;padding-left:10px' src='<?php echo $row['url2'];?>' onMouseOver="hinh2();">
			<input type="number" name="num" class="num" id="sl_<?php echo $masp; ?>" value="1" min="1" max="3">
    	</div>
		<div class="product-price">
			<span><?php echo $row['gia'];?>₫</span>
<?php	if(isset($_SESSION['admin'])){ ?>
			<a class="cart-btn" href="chinhsuasp.php?masp=<?php echo $row['masp']; ?>" onClick="return updateProduct();" >Sửa</a>
			<a class="cart-btn" href='javascript:void(0)' onClick="delProduct('<?php echo $row['masp']; ?>','<?php echo $row['tensp']; ?>');">Xóa</a>
<?php	} else { ?>
			<input type='submit' class="cart-btn" value="Thêm vào giỏ hàng" <?php if($row['soluongton']>0) { ?> onClick="addItem('<?php echo $masp;?>');" <?php } ?> >
			<div id='ghichu'></div>
<?php	}
		if($row['soluongton']<1) { ?>
			<p style='color:red'>* Hiện tại sản phẩm này đã hết hàng</p>
<?php	} ?>
		</div>
	</div>
<?php } else {
			header('Location: xulysanpham.php');
	} ?>
<?php } else {
	header('Location: cuahang.php');
} ?>
</main>
<script>
	function addItem(masp){
		soluong = $("#sl_"+masp).val();
		$.post("xuly_giohang.php",{"action":1,"masp":masp, "num":soluong},function(data){});
		document.getElementById("ghichu").innerHTML = '<p style="color: red; padding-left: 10px"> *Đã thêm vào giỏ hàng</p>';
	}
	function hinh1(){
		var s = "<img class='hinh-1' style='float:inherit' src='<?php echo $row['url1'];?>'>";
		document.getElementById("left-column").innerHTML = s;
	}
	function hinh2(){
		var s = "<img class='hinh-1' style='float:inherit' src='<?php echo $row['url2'];?>'>";
		document.getElementById("left-column").innerHTML = s;
	}
<?php 
	if(isset($_SESSION['admin'])) { 
		$manv = $_SESSION['admin'];
		$sql = "SELECT loainv FROM nhanvien WHERE manv='$manv'";
		$result = database::executeQuery($sql);
		$row = mysqli_fetch_array($result);
		$loainv = $row['loainv'];
		if(phanquyen::quanlykh($loainv)) {
?>
	function delProduct(masp,tensp){
		var r = confirm("Bạn có chắc chắn muốn xóa "+tensp+" không ?");
		if(r === true){
			$.post("xuly_sanpham.php",{"action":2,"masp":masp},function(data){});
			<?php
				if(isset($malsp)){
					$temp = "malsp=".$malsp;
				} else {
					if(isset($phanloai)){
						$temp = "phanloai=".$phanloai;
					} else {
						if(isset($search)){
							$temp = "tensp=".$search;
						}
					}
				}
			?>
			alert("Đã xóa thành công.");
			document.getElementById("ghichu").innerHTML = "<a href='cuahang.php<?php if(isset($temp)) echo("?".$temp); ?>' style='color: white;padding: 10px;background-color: #B80003;margin: 0px 50px'>Làm mới cửa hàng</a>";
		}
	}
	function updateProduct(){
		return true;
	}
<?php 	} else { ?>
	function delProduct(masp,tensp){
		alert("Bạn không đủ quyền hạn!!!");
	}
	function updateProduct(){
		alert("Bạn không đủ quyên hạn!!!");
		return false;
	}
<?php } }?>
</script>
</div>