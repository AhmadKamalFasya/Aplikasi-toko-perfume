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
            <li><a <?php if($page == "list_konfirmasi_pembayaran") { echo "style='color:rgb(121, 113, 234)'"; } ?> href="<?php echo BASE_URL."index.php?page=list_konfirmasi_pembayaran" ?>">Pembayaran</a></li>
            <li><a href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list" ?>">Pesanan</a></li>
           <li><a <?php if($page == "shop") ?> href="<?php echo BASE_URL."index.php?page=shop" ?>">Shop</a></li>
          </ul>
        </div>
      </nav>
    </header>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="row mb-5">
          <div class="col-md-12">
            <h3><center>Daftar Konfirmasi Pembayaran</center></h3>
            
          </div>
          <div class="col-md-12">
            <div class="">
              <?php
                $queryKonfirmasi = mysqli_query($link, "SELECT * FROM konfirmasi_pembayaran");
                if(mysqli_num_rows($queryKonfirmasi) == 0) {
                    require_once("notfound.html");
                  }else{  
              ?>
              <table class="table table-bordered">
                <thead style="background-color: rgb(121, 113, 234); color: white;">
                  <tr>
                    <th class="detail-pesanan-pendek">No</th>
                    <th class="detail-pesanan-pendek">Pesanan ID</th>
                    <th class="detail-pesanan-panjang">Nama Akun</th>
                    <th class="detail-pesanan-sedang">Nomor Rekening</th>
                    <th class="detail-pesanan-sedang">Tanggal Transfer</th>
                  </tr>
                </thead>
                  <?php

                    $no = 1;
                    while($row = mysqli_fetch_assoc($queryKonfirmasi)){
                  ?>
                <tbody>
                  <tr class="isi-detail-pesanan">
                    <td class="detail-pesanan-tengah"><?php echo $no; ?></td>
                    <td class="detail-pesanan-tengah"><?php echo $row['pesanan_id']; ?></td>
                    <td class="detail-pesanan-kiri"><?php echo $row['nama_account']; ?></td>
                    <td class="detail-pesanan-tengah"><?php echo $row['nomor_rekening']; ?></td>
                    <td class="detail-pesanan-tengah"><?php echo $row['tanggal_transfer']; ?></td>
                  </tr>
                </tbody>
                <?php $no++; } ?>
              </table>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

   