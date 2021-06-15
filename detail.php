<?php 

  $barang_id = $_GET['barang_id'];

 ?>

    <header class="site-navbar" role="banner">
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <?php  
              if ($level == "superadmin") {
            ?>
            <li><a href="<?php echo BASE_URL ?>">Home</a></li>
            <li><a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=list" ?>">Barang</a></li>
            <li><a href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=list" ?>">Kategori</a></li>
            <li><a href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=list" ?>">Kota</a></li>
            <li><a href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=list" ?>">User</a></li>
            <?php } ?>
            <li><a href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list" ?>">Pesanan</a></li>
            <li><a href="<?php echo BASE_URL."index.php?page=shop" ?>">Shop</a></li>
          </ul>
        </div>
      </nav>
    </header>

  <div class="site-wrap">
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Detail Barang</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <?php  
            $queryBarang = mysqli_query($link, "SELECT * FROM barang WHERE barang_id='$barang_id'");
            $row = mysqli_fetch_assoc($queryBarang);
          ?>
          <div class="col-md-6">
            <img src="images/barang/<?php echo $row['file']; ?>" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $row['nama_barang']; ?></h2>
            <p class="keterangan">Keterangan : <?php echo $row['spesifikasi']; ?></p>
            <p><strong class="text-primary h4"><?php echo rupiah($row['harga']) ?></strong></p>
            <p>
              <a href="<?php echo BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]" ?>" class="btn btn-sm btn-primary">Masukan Kedalam Keranjang</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>