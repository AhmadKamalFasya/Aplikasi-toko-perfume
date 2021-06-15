<?php

admin_only("barang", $level);

if (isset($_POST['submit'])) {

  $kategori_id = $_POST['kategori_id'];
  $nama_barang = $_POST['nama_barang'];
  $spesifikasi = $_POST['spesifikasi'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $jumlah = 0;

  $nama_file = $_FILES['gambar']['name'];
  $source = $_FILES['gambar']['tmp_name'];
  $folder = './images/barang/';

  move_uploaded_file($source, $folder . $nama_file);
  $sql = "INSERT INTO barang(kategori_id, nama_barang, spesifikasi, file, harga, stok, jumlah) 
        VALUES('$kategori_id', '$nama_barang', '$spesifikasi', '$nama_file', '$harga', '$stok', $jumlah)";
  $query = mysqli_query($link, $sql);

  header("location: " . BASE_URL . "index.php?page=my_profile&module=barang&action=list");
}


?>

<div class="site-wrap">
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="../../index.php">Home</a> <span class="mx-2 mb-0">/</span> <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=barang&action=list" ?>">Barang</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Input Barang</strong> </div>
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
              $query = mysqli_query($link, "SELECT kategori_id, kategori FROM kategori ORDER BY kategori ASC");
              while ($row = mysqli_fetch_assoc($query)) {
                if ($row_kategori = $row['kategori_id']) {
              ?>
                  <option value="<?php echo $row_kategori ?>" selected="true"><?php echo $row['kategori']; ?></option>
                <?php } else { ?>
                  <option value="<?php echo $row_kategori ?>"><?php echo $row['kategori']; ?></option>
                <?php } ?>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <label class="text-black">Nama barang</label>
            <input type="text" class="form-control" name="nama_barang">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <label class="text-black">Spesifikasi</label>
            <input type="text" class="form-control" name="spesifikasi">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <label class="text-black">Gambar Produk</label><br>
            <input type="file" name="gambar">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <label class="text-black">harga</label>
            <input type="text" class="form-control" name="harga" value="">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <label class="text-black">stok</label>
            <input type="text" class="form-control" name="stok" value="">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block" type="submit" name="submit">Tambah Barang</button>
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