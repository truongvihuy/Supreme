<?php
	session_start();
	require("cart.php");
	if(isset($_POST['action'])) {
		$action = $_POST['action'];
		switch ($action) {
			case '1': {
				$maspthem = $_POST['masp'];
				$soluongthem = $_REQUEST['num'];
				cart::addCart($maspthem,$soluongthem);
				break;
			}
			case '2': {
				$maspxoa = $_POST['masp'];
				cart::removeCart($maspxoa);
				if(cart::numCart()==0) cart::removeAll();
				break;
			}
			case '3': {
				cart::removeAll();
				break;
			}
			case '4': {
				$maspsua = $_POST['masp'];
				$soluongsua = $_POST['num'];
				cart::updateCart($maspsua,$soluongsua);
				break;
			}
		}
	}
?>