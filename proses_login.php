<?php

	include_once("function/connection.php");
	include_once("function/helper.php");

	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$query = mysqli_query($link, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='on' ");

	if (mysqli_num_rows($query) == 0) {
		header("location: ".BASE_URL."index.php?page=login&notif=true");
	}else{

		$row = mysqli_fetch_assoc($query);
		
		session_start();

		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['level'] = $row['level'];

		if(isset($_SESSION["proses_pesanan"])) {
			unset($_SESSION["proses_pesanan"]);
			header("location: ".BASE_URL."index.php?page=data_pemesan");
		}else{
			header("location: ".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");
		}
	}
	
?>