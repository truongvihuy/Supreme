<li class="menu-ngang" ><a title="Nam" href="cuahang.php?phanloai=B">Nam</a>	
	<ul class="menu-ngang-level-1">
		<li>Áo</li><br/>
<?php
	$sql = "SELECT * FROM loaisanpham WHERE malsp LIKE 'BA%'";
	$result=database::executeQuery($sql);
	while($row=mysqli_fetch_array($result)){
		echo("<li><a href='cuahang.php?malsp=".$row['malsp']."'>".$row['tenlsp']."</a></li><br/>");
	}
?>
		<li>Quần</li><br/>
<?php
	$sql = "SELECT * FROM loaisanpham WHERE malsp LIKE 'BQ%'";
	$result=database::executeQuery($sql);
	while($row=mysqli_fetch_array($result)){
		echo("<li><a href='cuahang.php?malsp=".$row['malsp']."'>".$row['tenlsp']."</a></li><br/>");
	}
?>
	</ul>	
</li>

<li class="menu-ngang" ><a title="Nữ" href="cuahang.php?phanloai=G">Nữ</a>
	<ul class="menu-ngang-level-1">
		<li>Áo</li><br/>
<?php
	$sql = "SELECT * FROM loaisanpham WHERE malsp LIKE 'GA%'";
	$result=database::executeQuery($sql);
	while($row=mysqli_fetch_array($result)){
		echo("<li><a href='cuahang.php?malsp=".$row['malsp']."'>".$row['tenlsp']."</a></li><br/>");
	}
?>
		<li>Quần</li><br/>
<?php
	$sql = "SELECT * FROM loaisanpham WHERE malsp LIKE 'GQ%'";
	$result=database::executeQuery($sql);
	while($row=mysqli_fetch_array($result)){
		echo("<li><a href='cuahang.php?malsp=".$row['malsp']."'>".$row['tenlsp']."</a></li><br/>");
	}
?>
	</ul>
</li>

<li><a title="Phụ Kiện" href="cuahang.php?phanloai=P">Phụ kiện</a>
	<ul class="menu-ngang-level-1">
<?php
	$sql = "SELECT * FROM loaisanpham WHERE malsp LIKE 'P%'";
	$result=database::executeQuery($sql);
	while($row=mysqli_fetch_array($result)){
		echo("<li class=\"menu-ngang-level-2\"><a href='cuahang.php?malsp=".$row['malsp']."'>".$row['tenlsp']."</a></li><br/>");
	}
?>
	</ul>
</li>