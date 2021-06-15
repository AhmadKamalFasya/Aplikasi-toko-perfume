<?php

$barang_id = $_GET['barang_id'];

$sqlBarang = "SELECT * FROM barang WHERE barang_id=$barang_id";
$queryBarang = mysqli_query($link, $sqlBarang);
$row = mysqli_fetch_assoc($queryBarang);

$kategori_id = $row['kategori_id'];
$nama_barang = $row['nama_barang'];
$spesifikasi = $row['spesifikasi'];
$nama_file = $row['file'];
$harga = $row['harga'];
$stok = $row['stok'];
$status = $row['status'];

$gambar = "<img src='" . BASE_URL . "images/barang/$nama_file' style='width: 200px;vertical-align: middle;' />";


if (isset($_POST['submit'])) {
  $kategori_id = $_POST['kategori_id'];
  $nama_barang = $_POST['nama_barang'];
  $spesifikasi = $_POST['spesifikasi'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $status = $_POST['status'];

  $nama_file = $_FILES['gambar']['name'];
  $source = $_FILES['gambar']['tmp_name'];
  $folder = './images/barang/';

  if ($nama_file != '') {
    move_uploaded_file($source, $folder . $nama_file);

    $update = mysqli_query($link, "UPDATE barang SET kategori_id='$kategori_id',
      nama_barang='$nama_barang',
      spesifikasi='$spesifikasi',
      file='$nama_file',
      harga='$harga',
      stok='$stok',
      status='$status' WHERE barang_id = '$barang_id'   
      ");
    header("location: " . BASE_URL . "index.php?page=my_profile&module=barang&action=list");
  } else {
    $update = mysqli_query($link, "UPDATE barang SET kategori_id='$kategori_id',
      nama_barang='$nama_barang',
      spesifikasi='$spesifikasi',
      harga='$harga',
      stok='$stok',
      status='$status' WHERE barang_id = '$barang_id'    
      ");
    header("location: " . BASE_URL . "index.php?page=my_profile&module=barang&action=list");
  }
}



?>

<div class="site-wrap">
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="../../index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Barang</strong> </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
          <div class="col-md-12">
            <label class="text-black">Kategori</label>
            <select name="kategori_id" class="form-control">
              <?php
              $query = mysqli_query($link, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
              while ($row = mysqli_fetch_assoc($query)) {
                if ($kategori_id == $row['kategori_id']) {
              ?>
                  <option value="<?php echo $row['kategori_id']; ?>" selected="true"><?php echo $row['kategori']; ?></option>
                <?php } else { ?>
                  <option value="<?php echo $row['kategori_id']; ?>"><?php echo $row['kategori']; ?></option>
                <?php } ?>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <label class="text-black">Nama barang</label>
            <input type="text" class="form-control" name="nama_barang" value="<?php echo $nama_barang; ?>">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <label class="text-black">Spesifikasi</label>
            <input type="text" class="form-control" name="spesifikasi" value="<?php echo $spesifikasi; ?>">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <label class="text-black">Gambar Produk</label><br>
            <input type="hidden" name="img" value="<?php echo $file; ?>">
            <input type="file" name="gambar"><?php echo $gambar; ?>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <label class="text-black">harga</label>
            <input type="text" class="form-control" name="harga" value="<?php echo $harga; ?>">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <label class="text-black">stok</label>
            <input type="text" class="form-control" name="stok" value="<?php echo $stok; ?>">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <label class="text-black">Status</label><br>
            <span>
              <input type="radio" name="status" value="on" <?php if ($status == "on") {
                                                              echo "checked='true'";
                                                            } ?> /> On
              <input type="radio" name="status" value="off" <?php if ($status == "off") {
                                                              echo "checked='true'";
                                                            } ?> /> Off
            </span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block" type="submit" name="submit">Edit Barang</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>

<script src="../../js/jquery-3.3.1.min.js"></script>
<script src="../../js/jquery-ui.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/jquery.magnific-popup.min.js"></script>
<script src="../../js/aos.js"></script>
<script src="../../js/main.js"></script>

</body>

</html>