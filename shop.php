<?php 

  include_once 'function/helper.php';
  include_once 'function/connection.php';

  $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
  

   // $search = isset($_GET["search"]) ? $_GET["search"] : false;

   //  $where = "";
   //  $search_url = "";

   //  if ($search) {
   //    $search_url = "&search=$search";
   //    $where = "WHERE barang.nama_barang LIKE '%$search%' ";
   // }


 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>
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
            <li><a <?php if($page == "list_konfirmasi_pembayaran") ?> href="<?php echo BASE_URL."index.php?page=list_konfirmasi_pembayaran" ?>">Pembayaran</a></li>
            <?php } ?>
            <li><a href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list" ?>">Pesanan</a></li>
           <li><a <?php if($page == "shop") { echo "style='color:rgb(121, 113, 234)'"; } ?> href="<?php echo BASE_URL."index.php?page=shop" ?>">Shop</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-9 order-2">
            <div class="row">
              <div class="col-md-12 mb-2">
                <?php  

                  $rows = '';
                  
                  $query = mysqli_query($link, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
                  $rows = mysqli_fetch_assoc($query);
                ?>
                <div class="float-md-left mb-4">
                  <h2 class="text-black h5">Daftar Barang <span class="text-primary"></span></h2>   		
                </div>
              </div>
            </div>
            <div class="row mb-5">
                <?php
                  if ($kategori_id) {
                    $kategori_id = "AND kategori_id='$kategori_id'";
                  }
                    $queryBarang = mysqli_query($link, "SELECT * FROM barang WHERE status='on' $kategori_id ORDER BY rand() DESC LIMIT 9");
                  $no =1;
                  while ($row=mysqli_fetch_assoc($queryBarang)) {
                ?>
              <div class="col-sm-6 col-lg-4 mb-4">
                <div class="text-center border">
                  <figure class="">
                    <a href="<?php echo BASE_URL."index.php?page=detail&barang_id=$row[barang_id]" ?>">
                      <img src="images/barang/<?php echo $row['file']; ?>" alt="Image placeholder" class="img-fluid">
                    </a>
                  </figure>
                  <div class="p-4">
                    <h6><a href="<?php echo BASE_URL."index.php?page=detail&barang_id=$row[barang_id]" ?>"><?php echo $row['nama_barang'] ?></a></h6>
                    <h6 class="mb-0">Stok <?php echo $row['stok']; ?></h6>
                    <h6 class="text-primary font-weight-bold"><?php echo rupiah($row['harga']) ?></h6>
                  </div>
                  <p>
                    <a href="<?php echo BASE_URL."index.php?page=detail&barang_id=$row[barang_id]" ?>" class="btn btn-sm btn-primary">Detail</a>
                  </p>
                </div>
              </div>
                  <?php $no++; } ?>
            </div>
            
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3>
                <a href="<?php echo BASE_URL."index.php?page=shop" ?>">Shop All</a>
              </h3>
                <p>Selamat berbelanja di toko online Trends Perfume!</p>
              
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a href="#" class="d-flex"><span></a></li>
              </ul>
            </div>

          <?php 
              $queryKategori = mysqli_query($link, "SELECT * FROM kategori");
             ?>
            <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Kategori</h3>
                  <?php  
                    $no = 1;
                    while($row = mysqli_fetch_assoc($queryKategori)){
                      if ($kategori_id == $row['kategori_id']) {
                    
                  ?>
                <a href="<?php echo BASE_URL."index.php?page=shop&kategori_id=$row[kategori_id]" ?>" class="d-flex color-item align-items-center">
                  <span class="text-primary aktif kategori"><?php echo $row['kategori']; ?></span>
                </a>
              <?php }else{ ?>
                <a href="<?php echo BASE_URL."index.php?page=shop&kategori_id=$row[kategori_id]" ?>" class="d-flex color-item align-items-center" >
                  <span class="text-black kategori"><?php echo $row['kategori']; ?></span>
                </a>
                <?php } $no++; } ?>
              </div>
            </div> 
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