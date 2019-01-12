<link type="text/css" rel="stylesheet" href="CSS/ctsp.css">
<body>
<div class="border">
<div class="border1">
<main class=container1 style=" margin-left: 30px;	margin-right: 50px	;">
<?php
	if(isset($_GET['masp'])) {
		$masp = $_GET['masp'];
		$sql = "SELECT * FROM sanpham WHERE masp='$masp'";
		$result = database::executeQuery($sql);
		$row = mysqli_fetch_array($result);
?>

	<form id="mainForm" method="post" action="xuly_sanpham.php" >
		<h1 style="text-align: center; color: red;font-size: 50px;"><?php echo $row['masp']; ?></h1>
		<input type="hidden" name="action" value="3">
		<input type="hidden" name="masp" value="<?php echo $row['masp']; ?>">
		<span>Tên sản phẩm: </span><input  type="text" name="tensp" style="text-align: center;"  value="<?php echo $row['tensp'];?>" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span>Loại sản phẩm: </span>
		<select name="malsp">
		<?php
			$sql = "SELECT * FROM loaisanpham";
			$result = database::executeQuery($sql);
			while($row1 = mysqli_fetch_array($result)) {
		?>
			<option value="<?php echo $row1['malsp'] ?>" <?php if($row['malsp']==$row1['malsp']) echo "selected"; ?>><?php echo($row1['tenlsp']." - ".$row1['phanloai']); ?></option>
		<?php } ?>
		</select>
		<span style=" margin-left: 69px">Hãng: </span><input type="text" name="hang" style="text-align: center; " value='<?php echo $row['hang'];?>' required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span>Số lượng tồn:</span><input type="number" name="soluong" style="text-align: center;"  value="<?php echo $row['soluongton'];?>" required>
		<span>Giá: </span><input type="number" name="gia" style="text-align: center;"  value="<?php echo $row['gia'];?>" required></br>

		<span>Thông tin sản phẩm: </span><textarea name="ttsp" style="text-align: center; margin-top: 10px;"rows="1" cols="50" type="text" required ><?php echo $row['ttsp']; ?></textarea><br>
		<input class="button" type="submit" value="Lưu" style="font-size: 30px; float: right;" ><br><br>
	</form>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class='hinh-nho-1' style='width:100px;padding-left:15px;' src='<?php echo $row['url1'];?>' onMouseOver="hinh1();">
		<img class='hinh-nho-2' style='width:100px;padding-left:15px' src='<?php echo $row['url2'];?>' onMouseOver="hinh2();">
	
	<script>
		function thaydoianh(){
			document.getElementById("hi	nh-anh").innerHTML = s;
			document.getElementById("doi-anh").innerHTML = 'Hủy thay đổi';
			document.getElementById("doi-anh").onclick = function() {huythaydoi()};
		}
		function huythaydoi(){
			document.getElementById("hinh-anh").innerHTML = '';
			document.getElementById("doi-anh").innerHTML = 'Đổi ảnh';
			document.getElementById("doi-anh").onclick = function() {thaydoianh()};
		}
		function hinh1(){
			var s = "<img class='hinh-1' style='float:inherit' src='<?php echo $row['url1'];?>'>";
			document.getElementById("left-column").innerHTML = s;
		}
		function hinh2(){
			var s = "<img class='hinh-1' style='float:inherit' src='<?php echo $row['url2'];?>'>";
			document.getElementById("left-column").innerHTML = s;
		}
	</script>
<?php
	}
?>
</main>
</div>
</div>
</body>