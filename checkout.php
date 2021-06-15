<?php  


  require_once'function/connection.php';
  $sql = "SELECT * FROM barang";
  $query = mysqli_query($link, $sql);

  $jumlah = 0;
  if (isset($_POST)) {
    $update = "UPDATE barang SET jumlah='$jumlah'";
  }

  echo "Sukses";

?> 


<form action="" method="">
  <button type="button" name="submit">Input</button>
</form>