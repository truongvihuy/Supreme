<?php
class database{
	public static function executeQuery($sql){
		$localhost="localhost";
		$root="root";
		$pass="";
		$database="fashionclothing";

		$con = mysqli_connect($localhost,$root,$pass,$database)or die("Could not connect: ".mysqli_error());
		mysqli_set_charset($con, 'UTF8');
		
		$result = mysqli_query($con,$sql);
		mysqli_close($con);
		
		return $result;
	}
}
?>