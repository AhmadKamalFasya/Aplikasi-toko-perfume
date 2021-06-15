<?php 
	
	$barang_id = $_GET['barang_id'];

	$delete = mysqli_query($link, "DELETE FROM barang WHERE barang_id='$barang_id'");
	if ($delete) {
		header("location: ".BASE_URL."index.php?page=my_profile&module=barang&action=list");
	}
	
 ?>