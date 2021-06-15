<?php 
  
  if($user_id){
    $module = isset($_GET['module']) ? $_GET['module'] : false;
    $action = isset($_GET['action']) ? $_GET['action'] : false; 
    $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
  }else{
    header("location: ".BASE_URL."index.php?page=login");
  }

  admin_only($module, $level);

 ?>
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <?php  
              if ($level == "superadmin") {
            ?>
            <li><a href="<?php echo BASE_URL ?>">Home</a></li>
            <li><a <?php if($module == "barang") { echo "style='color:rgb(121, 113, 234)'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=list" ?>">Barang</a></li>

            <li><a <?php if($module == "kategori") { echo "style='color:rgb(121, 113, 234)'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=list" ?>">Kategori</a></li>

            <li><a <?php if($module == "kota") { echo "style='color:rgb(121, 113, 234)'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=list" ?>">Kota</a></li>

            <li>
              <a <?php if($module == "user") { echo "style='color:rgb(121, 113, 234)'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=list" ?>">User</a></li>
            <li>
              <a <?php if($module == "konfirmasi") { echo "style='color:rgb(121, 113, 234)'"; } ?> href="<?php echo BASE_URL."index.php?page=list_konfirmasi_pembayaran" ?>">Pembayaran</a>
            </li>
            <?php } ?>
            <li><a <?php if($module == "pesanan") { echo "style='color:rgb(121, 113, 234)'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list" ?>">Pesanan</a></li>

            <li><a <?php if($module == "shop") { echo "style='color:rgb(121, 113, 234)'"; } ?> href="<?php echo BASE_URL."index.php?page=shop" ?>">Shop</a></li>
          </ul>
        </div>
      </nav>
    </header>
  </div>

  <?php

    $file = "module/$module/$action.php";
    if (file_exists($filename)) {
      include_once($file);
    }else{
      include_once("notfound.html");
    }
  ?>
