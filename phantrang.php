<?php
	$sql = "SELECT COUNT(masp) AS total FROM sanpham ";
	if(isset($_GET['malsp'])){
		$malsp = $_GET['malsp'];
		$sql = $sql."WHERE malsp='$malsp' ";
	} else {
		if(isset($_GET['phanloai'])){
			$phanloai = $_GET['phanloai'];
			$sql = $sql."WHERE malsp LIKE '$phanloai%' ";
		} else {
			if(isset($_GET['tensp'])){
				$search = $_GET['tensp'];
				$sql = $sql."WHERE tensp LIKE '%$search%'";
			}
		}
	}
	
	$tong_sp = database::executeQuery($sql);
	$tong_sp = mysqli_fetch_assoc($tong_sp);
	$tong_sp = $tong_sp['total'];
	$gioi_han = 6;
	$tong_trang = ceil($tong_sp / $gioi_han);

	$trang_hien_hanh = isset($_GET['page']) ? $_GET['page'] : 1;
	if($trang_hien_hanh > $tong_trang) $trang_hien_hanh = $tong_trang;
	if($trang_hien_hanh < 1) $trang_hien_hanh = 1;

	$bat_dau = ($trang_hien_hanh-1) * $gioi_han;
	$sql = "SELECT masp, tensp, gia, url1 FROM sanpham ";
	if(isset($malsp)){
		$sql = $sql."WHERE malsp='$malsp' ";
	} else {
		if(isset($phanloai)){
			$sql = $sql."WHERE malsp LIKE '$phanloai%' ";
		} else {
			if(isset($search)){
				$sql = $sql."WHERE tensp LIKE '%$search%'";
			}
		}
	}
	$sql = $sql."LIMIT $bat_dau, $gioi_han";
	$result = database::executeQuery($sql);
	

?>
<div id="sanpham">
	<ul>
<?php	while($row=mysqli_fetch_array($result)){ ?>
		<li>
			<div class="hinh">
				<a title='<?php echo $row['tensp'];?>' href='sanpham.php?masp=<?php echo $row['masp'] ?>'><div class="thumb" style="background-image: url(<?php echo $row['url1'] ?>);"></div></a>
			</div>
			<div class="thongtin">
				<h5><a title='<?php echo $row['tensp'];?>' href='sanpham.php?masp=<?php echo $row['masp'];?>'><?php echo $row['tensp'];?></a></h5>
				<span><?php echo $row['gia'];?><span>₫</span></span>
			</div>
		</li>
<?php	} ?>
	</ul>
</div>
<div style="padding-left: 100px;color: #000000;padding: 14 16px;margin-left: 10px;" id="chuyen">
<?php
	if($trang_hien_hanh > 1)
		echo("<a href='cuahang.php?".(isset($phanloai)?"phanloai=$phanloai&":(isset($malsp)?"malsp=$malsp&":(isset($search)?"tensp=$search&":"")))."page=1'><<</a>");
	if($trang_hien_hanh > 1)
		echo("<a href='cuahang.php?".(isset($phanloai)?"phanloai=$phanloai&":(isset($malsp)?"malsp=$malsp&":(isset($search)?"tensp=$search&":"")))."page=".($trang_hien_hanh-1)."'><</a>");
	
	for($i=1; $i<=$tong_trang; $i++){
		if($i == $trang_hien_hanh) echo("<span>$i</span>");
		else echo("<a href='cuahang.php?".(isset($phanloai)?"phanloai=$phanloai&":(isset($malsp)?"malsp=$malsp&":(isset($search)?"tensp=$search&":"")))."page=$i'>$i</a>");
	}
	
	if($trang_hien_hanh < $tong_trang)
		echo("<a href='cuahang.php?".(isset($phanloai)?"phanloai=$phanloai&":(isset($malsp)?"malsp=$malsp&":(isset($search)?"tensp=$search&":"")))."page=".($trang_hien_hanh+1)."'>></a>");
	if($trang_hien_hanh < $tong_trang)
		echo("<a href='cuahang.php?".(isset($phanloai)?"phanloai=$phanloai&":(isset($malsp)?"malsp=$malsp&":(isset($search)?"tensp=$search&":"")))."page=".($tong_trang)."'>>></a>");
?>
</div>