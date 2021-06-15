<?php 
	

	define("BASE_URL", "http://localhost/perfume/");

	$arrayStatusPesanan[0] = "Menunggu Pembayaran";
	$arrayStatusPesanan[1] = "Pembayaran Sedang di Validasi";
	$arrayStatusPesanan[2] = "Lunas";
	$arrayStatusPesanan[3] = "Pembayaran di Tolak";


	function rupiah($nilai = 0){
		$string = "Rp. " .number_format($nilai);
		return $string;
	}

	function admin_only($module, $level){
		if ($level != "superadmin") {
			$admin_page = array("kategori", "barang", "kota", "user");
			if (in_array($module, $admin_page)) {
				header("location: ".BASE_URL);
			}
		}
	}


	function rating($nilaiR = 0){
      if($nilaiR <= 20){
        $stars = "<i class='icon-star'></i>";
      }else if($nilaiR <= 30){
        $stars = "<i class='icon-star'></i><i class='icon-star-half'></i>";
      }else if($nilaiR <= 40){
        $stars = "<i class='icon-star'></i><i class='icon-star'></i>";
      }else if($nilaiR <= 50){
        $stars = "<i class='icon-star'></i><i class='icon-star'></i></i><i class='icon-star'></i>";
      }else if($nilaiR <= 60){
        $stars = "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i>";
      }else if($nilaiR <= 70){
        $stars = "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star-half'></i>";
      }else if($nilaiR <= 80){
        $stars = "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i>";
      }else if($nilaiR <= 90){
        $stars = "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star-half'></i>";
      }else if($nilaiR <= 100){
        $stars = "<i class='icon-star'></i><i class='icon-star'><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i></i>";
      }

      echo $stars;
	}
 ?>