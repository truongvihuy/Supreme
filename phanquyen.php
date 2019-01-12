<?php 
class phanquyen{
	public static function quanlytk($loainv){
		if($loainv=="1") return true;
		return false;
	}
	public static function quanlyhd($loainv){
		if($loainv=="1" || $loainv=="2") return true;
		return false;
	}
	public static function quanlykh($loainv){
		if($loainv=="1" || $loainv=="3") return true;
		return false;
	}
}
?>