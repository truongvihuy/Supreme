<div class="admin1" style="background-image:url(IMG/white-wallpaper-14.jpg)">
<div style="margin-left: 200px;" class=content2>
	<div class="admin" onClick="accadmin();">Tài khoản admin</div><div class="admin" onClick="accuser();">Tài khoản người dùng</div>
	<a class="admin" href="themadmin.php" onClick="return kt();">Thêm tài khoản</a>
	<div id="list-account">
		<table id="table1">
			<tr>
				<th>Mã nhân viên: </th>
				<th>Họ tên: </th>
				<th>Ngày sinh: </th>
				<th>Địa chỉ: </th>
				<th>Email: </th>
				<th>Số điện thoại: </th>
				<th>Loại nhân viên: </th>
				<th></th>
			</tr>
<?php
	$sql = "SELECT manv,hoten,ngaysinh,diachi,email,sdt,loainv FROM nhanvien ";
	$result = database::executeQuery($sql);
	while($row = mysqli_fetch_array($result)){
?>
			<tr id="<?php echo $row['manv'];?>"> 
				<td><?php if($row['manv']==$_SESSION['admin']) echo("<b>".$row['manv']."</b>"); else echo $row['manv']?></td>
				<td><?php if($row['manv']==$_SESSION['admin']) echo("<b>".$row['hoten']."</b>"); else echo $row['hoten'];?></td>
				<td><?php if($row['manv']==$_SESSION['admin']) echo("<b>".$row['ngaysinh']."</b>"); else echo $row['ngaysinh'];?></td>
				<td><?php if($row['manv']==$_SESSION['admin']) echo("<b>".$row['diachi']."</b>"); else echo $row['diachi'];?></td>
				<td><?php if($row['manv']==$_SESSION['admin']) echo("<b>".$row['email']."</b>"); else echo $row['email'];?></td>
				<td><?php if($row['manv']==$_SESSION['admin']) echo("<b>".$row['sdt']."</b>"); else echo $row['sdt'];?></td>
				<td><?php if($row['loainv']=="1") echo "Quản lý"; else if($row['loainv']=="2") echo "Nhân viên bán hàng"; else echo "Nhân viên quản kho";?></td>
				<td><a onClick="xoa('<?php echo $row['manv'];?>');">Xóa</a></td>
			</tr>
<?php
	}
?>
		</table>
	</div>
</div>
<script>
	function accadmin(){
		var s = '' +
		'<table id="table1">' +
			'<tr>' +
				'<th>Mã nhân viên: </th>' +
				'<th>Họ tên: </th>' +
				'<th>Ngày sinh: </th>' +
				'<th>Địa chỉ: </th>' +
				'<th>Email: </th>' +
				'<th>Số điện thoại: </th>' +
				'<th>Loại nhân viên: </th>' +
				'<th></th>' +
			'</tr>' +
<?php
	$sql = "SELECT manv,hoten,ngaysinh,diachi,email,sdt,loainv FROM nhanvien ";
	$result = database::executeQuery($sql);
	while($row = mysqli_fetch_array($result)){
?>
			'<tr>' +
				'<td><?php if($row['manv']==$_SESSION['admin']) echo("<b>".$row['manv']."</b>"); else echo $row['manv']?></td>' +
				'<td><?php if($row['manv']==$_SESSION['admin']) echo("<b>".$row['hoten']."</b>"); else echo $row['hoten'];?></td>' +
				'<td><?php if($row['manv']==$_SESSION['admin']) echo("<b>".$row['ngaysinh']."</b>"); else echo $row['ngaysinh'];?></td>' +
				'<td><?php if($row['manv']==$_SESSION['admin']) echo("<b>".$row['diachi']."</b>"); else echo $row['diachi'];?></td>' +
				'<td><?php if($row['manv']==$_SESSION['admin']) echo("<b>".$row['email']."</b>"); else echo $row['email'];?></td>' +
				'<td><?php if($row['manv']==$_SESSION['admin']) echo("<b>".$row['sdt']."</b>"); else echo $row['sdt'];?></td>' +
				'<td><?php if($row['loainv']=="1") echo "Quản lý"; else if($row['loainv']=="2") echo "Nhân viên bán hàng"; else echo "Nhân viên quản kho";?></td>' +
				'<td><a onClick="xoa(\"<?php echo $row['manv'];?>\");">Xóa</a></td>' +
			'</tr>' +
<?php
	}
?>
		'</table>';
		document.getElementById("list-account").innerHTML = s;
	}
	function accuser(){
		var s = '' +
		'<table>' +
			'<tr>' +
				'<th>Mã khách hàng: </th>' +
				'<th>Họ tên: </th>' +
				'<th>Ngày sinh: </th>' +
				'<th>Địa chỉ: </th>' +
				'<th>Email: </th>' +
				'<th>Số điện thoại: </th>' +
				'<th>Ghi chú: </th>' +
			'</tr>' +
<?php
	$sql = "SELECT makh,hoten,ngaysinh,diachi,email,sdt,ghichu FROM khachhang";
	$result = database::executeQuery($sql);
	while($row = mysqli_fetch_array($result)){
?>
			'<tr>' +
				'<td><?php echo $row['makh'];?></td>' +
				'<td><?php echo $row['hoten'];?></td>' +
				'<td><?php echo $row['ngaysinh'];?></td>' +
				'<td><?php echo $row['diachi'];?></td>' +
				'<td><?php echo $row['email'];?></td>' +
				'<td><?php echo $row['sdt'];?></td>' +
				'<td><input type="checkbox" id="<?php echo $row['makh'];?>" <?php if($row['ghichu']=="1") echo "checked";?> onChange="userxau(\'<?php echo $row['makh'];?>\');">User xấu</td>' +
			'</tr>' +
<?php
	}
?>
		'</table>';
		document.getElementById("list-account").innerHTML = s;
	}
	function userxau(makh){
		var s = document.getElementById(makh).checked;
		$.post("xuly_account.php",{"action":1,"makh":makh,"userxau":s},function(data){});
	}
	function kt(){
<?php 
	if($_SESSION['admin']) { 
		$manv = $_SESSION['admin'];
		$sql = "SELECT loainv FROM nhanvien WHERE manv='$manv'";
		$result = database::executeQuery($sql);
		$row = mysqli_fetch_array($result);
		$loainv = $row['loainv'];
		if(phanquyen::quanlykh($loainv)) {
?>
		return true;
<?php	} else { ?>
		alert("Bạn không đủ quyền hạn!!!");
		return false;
<?php	}  
	} ?>
	}
	function xoa(manv){
<?php 
	if($_SESSION['admin']) { 
		$manv = $_SESSION['admin'];
		$sql = "SELECT loainv FROM nhanvien WHERE manv='$manv'";
		$result = database::executeQuery($sql);
		$row = mysqli_fetch_array($result);
		$loainv = $row['loainv'];
		if(phanquyen::quanlykh($loainv)) {
?>
		var r = confirm("Bạn có chắc chắn muốn xóa "+manv+" không ?");
		if(r === true){
			$.post("xuly_account.php",{"action":3,"manv":manv},function(data){});
			alert("Đã xóa thành công!!!");
			document.getElementById(manv).style.display = "none";
		}
<?php	} else { ?>
		alert("Bạn không đủ quyền hạn!!!");
<?php	}  
	} ?>
	}
</script>
</div>