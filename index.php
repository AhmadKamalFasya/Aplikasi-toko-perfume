<?php 
  
  include_once 'function/helper.php';
  include_once 'function/connection.php';

  session_start();

  $page = isset($_GET['page']) ? $_GET['page'] : false;
  $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

  $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
  $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
  $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

  $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();

  $totalBarang = count($keranjang);

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>TRENDS PERFUME &mdash; Paledang</title>
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
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-4 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <?php if ($level == true) { ?>
                <b>Hi, <?php echo $nama; ?> !</b><br>
                <b>Selamat datang di Trends Perfume</b>
              <?php } ?>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="<?php echo BASE_URL."index.php" ?>" class="js-logo-clone">Trends Perfume</a>
              </div>
            </div>
            <div class="col-8 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <?php  
                    if ($user_id) {
                  ?>
                    <li><a href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list"; ?>"><span class="icon icon-person"></span></a></li>

                  <?php 
                    }else{

                   ?>
                  <li><a href="<?php echo BASE_URL."index.php?page=login"; ?>">Login</a></li>
                  <li><a href="<?php echo BASE_URL."index.php?page=register"; ?>">Register</a></li>
                  <?php 
                    }
                   ?>

                   <li>
                    <a href="<?php echo BASE_URL."index.php?page=keranjang"; ?>" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                       <?php if ($totalBarang != 0) {
                        ?>
                      <span class="count"><?php  echo $totalBarang; ?></span>
                    <?php } ?>
                    </a>
                  </li>
                  <?php if ($level == "superadmin"){ ?>
                      <li>
                        <a href="<?php echo BASE_URL."index.php?page=my_profile&module=rekomendasi&action=list" ?>"><i class="icon-star-half-full"></i></a>
                      </li>
                  <?php }?>
                  <?php if ($user_id){ ?>
                   <li><a href="<?php echo BASE_URL."logout.php"; ?>">Logout</a></li>
                 <?php } ?>
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
    </header>

    <?php 
      $filename = "$page.php";

      if (file_exists($filename)) {
        include_once($filename);
      }else{
        include_once("main.php");
      }
     ?>

     <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigasi</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Penjualan Online</a></li>
                  <li><a href="#">Berbagai Fitur</a></li>
                  <li><a href="#">Keranjang barang</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Perdagangan seluler</a></li>
                  <li><a href="#">pemasaran online</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promo</h3>
            <a href="#" class="block-6">
              <img src="images/1234.png" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0">Temukan Parfum Yang Cocok</h3>
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">Jl.Paledang, Kec. Ciparay, Kab. Bandung Jawa, Barat, Indonesia</li>
                <li class="phone"><a href="tel://23923929210">089-111-111-111</a></li>
                <li class="email">contohemail@gmail.com</li>
              </ul>
            </div>

          </div>
        </div>
        <div class="row pt-2 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="<?php echo BASE_URL."index.php" ?>">Trends Perfume</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
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