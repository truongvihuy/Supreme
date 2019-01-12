<div class=content style="background-image: url(IMG/611487.jpg)">
	<script type="text/javascript">
		  $(function() {
		  $('a[href*=#]').on('click', function(e) {
			e.preventDefault();
			$('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
		  });
		});
	</script>

	<section id="section01" class="demo">
		<a href="#section02"><span></span>Scroll</a>
	</section>
	<section id="section02" class="demo">
	  	<a href="#section03"><span></span>Scroll</a>
	</section>
	<section id="section03" class="demo">

	</section>
</div>
	
<div style="background-image:url(IMG/white-wallpaper-14.jpg)" class="mau">
	<ul>
		<h1 style="margin-left: 80px;margin-top: 80px"> Sản Phẩm Mới Nhất </h1>
<?php
	$sql = "SELECT masp, tensp, gia, url1 FROM sanpham ORDER BY ngaynhap DESC LIMIT 0,6 ";
	$result = database::executeQuery($sql);
	while($row = mysqli_fetch_array($result)) {
?>
			<li style="line-height: 50px">
				<div class="hinh">
					<a title='<?php echo $row['tensp'];?>' href='sanpham.php?masp=<?php echo $row['masp'] ?>'><div class="thumb" style="background-image: url(<?php echo $row['url1'] ?>);"></div></a>
				</div>
				<div style="margin-top: 10px;padding-top: 10px" class="thongtin"> 
					<h5><a style="margin-top: 20px;color: #000000" title='<?php echo $row['tensp'];?>' href='sanpham.php?masp=<?php echo $row['masp'];?>'><?php echo $row['tensp'];?></a></h5>
				</div>
				<span style="margin-top: 50px"><?php echo $row['gia'];?><span>₫</span></span>
			</li>
<?php } ?>
	</ul>
</div>	