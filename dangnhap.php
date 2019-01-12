<link rel="stylesheet" type="text/css" href="CSS/login.css">
<?php 
	// Nếu click vào nút Lưu Session
	if (isset($_POST['log']) ==TRUE)
	{
		$user=$_POST['text_user'];
		$pass=$_POST['text_passwd'];
		//echo"$user $pass";
		$sql = "SELECT makh,password FROM khachhang WHERE makh='$user' AND password=md5('$pass')";
		$result = database::executeQuery($sql);
		if(mysqli_num_rows($result)>0){
		// Lưu Session
			$_SESSION['name'] = $user;
			header ( 'Location: index.php' );
		}
		
	}
?>
<li><a title="Đăng nhập" onclick="document.getElementById('id01').style.display='block'" ><img src="IMG/login.png"></a></li>

<div id="id01" class="modal">
	<form class="modal-content animate" name="sub" action="" method="post" >
		<div class="imgcontainer">
			<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
			<img src="IMG/829d15f2c100855d085e46ebe3d9569a.png"img_avatar2.png"" alt="Avatar" class="avatar">
		</div>
		<div class="container">	
			<label for="uname"><b>Tên đăng nhập</b></label>
			<input type="text" placeholder="Nhập tên đăng nhập" name="text_user" required>
			<label for="psw"><b>Mật khẩu</b></label>
			<input type="password" placeholder="Nhập mật khẩu" name="text_passwd" required> 
			<button type="submit" name="log">Đăng nhập</button>
		</div>
		<div class="container" style="background-color:#232323">
			<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Thoát</button>
			<span class="psw"><a class="tao-tk" style="font-size: 15px;height: 40px;margin-top: 8px;background:#BF0003;color:#FFFFFF;"  href="register.php">Tạo tài khoản</a></span>
		</div>
  	</form>
</div>