<?php  

	// $warna["data1"] = array("H" => "hijau",
	// 						"K" => "kuning",
	// 						"M" => "merah");


	// $warna["data2"] = array("B" => "Biru",
	// 						"U" => "Ungu",
	// 						"P" => "Perak");
			
	// echo $warna["data2"]["B"];
	
	// echo "<pre>";
	// print_r($warna);
	// echo "<pre>";

	include_once('function/connection.php');
	include_once('function/helper.php');

	session_start();

	$barang_id = $_GET['barang_id'];
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;

	$query = mysqli_query($link, "SELECT nama_barang, file, harga FROM barang WHERE barang_id ='$barang_id'");
	$row = mysqli_fetch_assoc($query);

	$keranjang[$barang_id] = array("nama_barang" => $row["nama_barang"],
		"file" => $row["file"],
		"harga" => $row["harga"],
		"quantity" => 1);

	$_SESSION["keranjang"] = $keranjang;

	header("location: ".BASE_URL."index.php?page=shop");

?>
<!-- <h3><?php echo $keranjang["$barang_id"]["nama_barang"]; ?></h3>
<h3><?php echo $keranjang["$barang_id"]["harga"]; ?></h3>
<h3><?php echo $keranjang["$barang_id"]["quantity"]; ?></h3>
<h3><img src="images/barang/<?php echo $keranjang["$barang_id"]["file"]; ?>"></h3> -->