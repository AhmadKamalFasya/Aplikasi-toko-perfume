<?php 

	$user_id = $_GET['user_id'];

	$delete = mysqli_query($link, "DELETE FROM user WHERE user_id='$user_id'");
	if($delete){
		header("location: ".BASE_URL."index.php?page=my_profile&module=user&action=list");
	}
 ?>