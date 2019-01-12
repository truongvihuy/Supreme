<?php

	//Khai báo sử dụng session
	session_start();

	//Xóa session "username"
	if(isset($_SESSION['name']))
		unset( $_SESSION['name'] );
	if(isset($_SESSION['admin']))
		unset( $_SESSION['admin'] );
	//Chuyển hướng về index.php
	header ( 'Location: index.php' );
?>