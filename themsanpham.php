<html>
<head>	
<meta charset="utf-8">
<title>TEEN ĐÚ FASHION</title>
	<link rel="stylesheet" type="text/css" href="CSS/themsp.css">
	<script src="JS/jquery.min.js"></script>
	<script type="text/javascript">
	function check(){
		var varcheck=document.checktt;
		
		var fileInput = document.getElementById('image_url');
		var filePath = fileInput.value;//lấy giá trị input theo id
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
		if(!allowedExtensions.exec(filePath)){
			alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif only.');
			fileInput.value = '';
			return false;
		}
		var fileInput1 = document.getElementById('image_url1');
		var filePath1 = fileInput1.value;//lấy giá trị input theo id
		var allowedExtensions1 = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
		if(!allowedExtensions1.exec(filePath1)){
			alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif only.');
			fileInput1.value = '';
			return false;
		}
		 	
		if(varcheck.text_name.value===""){
			document.getElementById("loi1").style.display = "block";
			varcheck.text_name.focus();
			return false;	
		}
		if(varcheck.masph.value===""){
			document.getElementById("loi2").style.display = "block";
			varcheck.masph.focus();
			return false;	
		}
		if(varcheck.malsph.value===""){
			document.getElementById("loi3").style.display = "block";
			varcheck.malsph.focus();
			return false;	
		}
		if(varcheck.text_info.value===""){
			document.getElementById("loi4").style.display = "block";
			varcheck.text_info.focus();
			return false;	
		}
		if(varcheck.soluong.value===""){
			document.getElementById("loi5").style.display = "block";
			varcheck.soluong.focus();
			return false;	
		}
		if(varcheck.gia.value===""){
			document.getElementById("loi6").style.display = "block";
			varcheck.gia.focus();
			return false;	
		}
		if(varcheck.text_hang.value===""){
			document.getElementById("loi7").style.display = "block";
			varcheck.text_hang.focus();
			return false;	
		}	
	}
</script>
</head>

<body >
	<form name="checktt" id="checktt" method="POST" enctype="multipart/form-data" action="xuly_sanpham.php" onSubmit="return check()" 	>
		<div class="login" >
			<h2>Thêm Sản Phẩm</h2>
			<input type="hidden" name="action" value="1">
			<span>Tên Sản Phẩm:</span><input name="text_name" style="margin-left: 100px;" id="text_name" placeholder="Nhập tên sản phẩm" required type="text"  ><br>	
			<span>Chọn loại sản phẩm:</span>	
			<select name="malsp" style="margin-left: 50px;">	
			<?php
			require("database.php");
			$sql = "SELECT * FROM loaisanpham ";
			$result = database::executeQuery($sql);
			while($row=mysqli_fetch_array($result)) {
				echo("<option value='".$row['malsp']."'>".$row['tenlsp']." - ".$row['phanloai']."</option>");
			}
		?>
			</select><br>
			<span>Thông tin sản phẩm: </span>
			<textarea name="text_info" style="margin-left: 48px;" id="text_info" cols="2" rows="1" type="text" required placeholder="Thông tin sản phẩm" ></textarea><br>
			<span>Số Lượng: </span><input name="soluong" style="margin-left: 134px;" id="soluong" placeholder="Số lượng" min="0" type="number" required><br>
			<span>Giá: </span><input name="gia" style="margin-left: 190px;" id="gia" placeholder="Giá" min="1000" type="number" required><br>
			<span>Hãng sản xuất: </span><input name="text_hang" style="margin-left: 95px;" id="text_hang" placeholder="Hãng sản xuất" type="text" required >	<br>
			<h3>Thêm ảnh sản phẩm:</h3>
			<input class="anh" name="image_url" accept="image/*" id="image_url" title="Thêm ảnh" type="file"  value="Thêm ảnh" required>
			<input class="anh" name="image_url1" accept="image/*" id="image_url1" title="Thêm ảnh" type="file"  value="Thêm ảnh" required><br>
			<input class="button" type="submit" value="Thêm">
		</div>
	</form>

</body>
</html>
