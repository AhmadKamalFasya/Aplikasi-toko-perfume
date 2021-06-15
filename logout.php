<?php 

	session_start();

	unset($_SESSION['user_id']);
	unset($_SESSION['nama']);
	unset($_SESSION['level']);
	unset($_SESSION['keranjang']);

	header("location: index.php");

 ?>