<?php 

	$kota_id = $_GET['kota_id'];

	$delete = mysqli_query($link, "DELETE FROM kota WHERE kota_id='$kota_id'");
	if($delete){
		header("location: ".BASE_URL."index.php?page=my_profile&module=kota&action=list");
	}
 ?>