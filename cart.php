<?php
class cart{
	public static function addCart($masp,$soluong){
		$tam;
		if(isset($_SESSION['cart'][$masp])){
			$tam = $_SESSION['cart'][$masp] + $soluong;
		} else {
			$tam = $soluong;
		}
		$_SESSION['cart'][$masp] = $tam;
	}
	public static function updateCart($masp,$soluong){
		if($soluong > 0) $_SESSION['cart'][$masp] = $soluong;
		else unset($_SESSION['cart'][$masp]);
	}
	public static function removeCart($masp){
		unset($_SESSION['cart'][$masp]);
	}
	public static function removeAll(){
		unset($_SESSION['cart']);
	}
	public static function numCart(){
		$num = 0;
		foreach($_SESSION['cart'] as $masp => $soluong){
			if(isset($masp)) $num ++;
		}
		return $num;
	}
}
?>