<?php 

	require_once('../../function/connection.php');
	require_once('../../function/helper.php');

	admin_only("kategori", $level);

	$kategori = $_POST['kategori'];
	$status = $_POST['status'];
	$button = $_POST['button'];

	if ($button == "(+) Tambah Kategori") {
		mysqli_query($link, "INSERT INTO kategori (kategori, status) VALUES ('$kategori', '$status') ");
	}else if ($button == "Update"){
		$kategori_id = $_GET['kategori_id'];
		
		mysqli_query($link, "UPDATE kategori SET kategori = '$kategori', status = '$status'
											WHERE kategori_id='$kategori_id' ");
	}
	header("location: ".BASE_URL."index.php?page=my_profile&module=kategori&action=list");

 ?>