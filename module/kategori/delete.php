<?php 
	
	$kategori_id = $_GET['kategori_id'];

	$delete = mysqli_query($link, "DELETE FROM kategori WHERE kategori_id='$kategori_id'");
	if ($delete) {
		header("location: ".BASE_URL."index.php?page=my_profile&module=kategori&action=list");
	}
	
 ?>