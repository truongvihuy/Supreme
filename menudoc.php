<div class="menudoc1">
<h3>Danh mục sản phẩm</h3>
<ul class="level-0"><a href="cuahang.php?phanloai=B">Nam</a>
	<li>
		<ul id="title">Áo</ul>
		<ul class="level-1">
			<?php
				$sql = "SELECT * FROM loaisanpham WHERE malsp LIKE 'BA%'";
				$result=database::executeQuery($sql);
				while($row=mysqli_fetch_array($result)){
					echo("<li class=\"level-2\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='cuahang.php?malsp=".$row['malsp']."'>".$row['tenlsp']."</a></li>");
				}
			?>
		</ul>
	</li>
	<li>
		<ul id="title">Quần</ul>
		<ul class="level-1">
			<?php
				$sql = "SELECT * FROM loaisanpham WHERE malsp LIKE 'BQ%'";
				$result=database::executeQuery($sql);
				while($row=mysqli_fetch_array($result)){
					echo("<li class=\"level-2\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='cuahang.php?malsp=".$row['malsp']."'>".$row['tenlsp']."</a></li>");
				}
			?>
		</ul>
	</li>
</ul>
<ul class="level-0"><a href="cuahang.php?phanloai=G">Nữ</a>
	<li>
		<ul id="title">Áo</ul>
		<ul class="level-1">
			<?php
				$sql = "SELECT * FROM loaisanpham WHERE malsp LIKE 'GA%'";
				$result=database::executeQuery($sql);
				while($row=mysqli_fetch_array($result)){
					echo("<li class=\"level-2\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='cuahang.php?malsp=".$row['malsp']."'>".$row['tenlsp']."</a></li>");
				}
			?>
		</ul>
	</li>
	<li>
		<ul id="title">Quần</ul>
		<ul class="level-1">
			<?php
				$sql = "SELECT * FROM loaisanpham WHERE malsp LIKE 'GQ%'";
				$result=database::executeQuery($sql);
				while($row=mysqli_fetch_array($result)){
					echo("<li class=\"level-2\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='cuahang.php?malsp=".$row['malsp']."'>".$row['tenlsp']."</a></li>");
				}
			?>
		</ul>
	</li>
</ul>
<ul class="level-0"><a  href="cuahang.php?phanloai=P">Phụ kiện</a>
	<li>
		<ul class="level-1">
			<?php
				$sql = "SELECT * FROM loaisanpham WHERE malsp LIKE 'P%'";
				$result=database::executeQuery($sql);
				while($row=mysqli_fetch_array($result)){
					echo("<li class=\"level-2\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='cuahang.php?malsp=".$row['malsp']."'>".$row['tenlsp']."</a></li>");
				}
			?>
		</ul>
	</li>
</ul>
</div>