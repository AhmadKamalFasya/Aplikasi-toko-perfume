
    <div style="background-color: #84cfce;">
    <div class="container" >
      <div class="row" >
        <div class="col-lg-6 col-sm-12 mt-5 mb-5 d-none d-sm-block"><img src="images/bg-parfum.png" width="450px"></div>
        <div class="col-lg-6 col-sm-12 mt-5 mb-5 d-flex align-items-center text-sm-right" >
          <div>
             <h1 class="" style="color: #000;">Temukan Parfum Yang Cocok Untukmu</h1>
              <p class="">"Parfum seperti sepotong pakaian, pesan, cara mempersembahkan diri sendiri, kostum yang berbeda menurut wanita yang memakainya." - Paloma Picasso</p>
              <p>
                <a href="<?php echo BASE_URL."index.php?page=shop" ?>" class="btn btn-sm btn-primary">Belanja Sekarang</a>
              </p>
          </div>
        </div>
      </div>
    </div>
    </div>
    
      <div class="site-section site-section-sm site-blocks-1 mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Pengiriman Cepat</h2>
              <p>Dalam pengiriman barang Trends Perfume menyediakan jasa kurir sendiri sehingga tidak membutuhkan waktu tunggu yang cukup lama.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-credit-card"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Pembayaran Mudah</h2>
              <p>Trends Perfume menyediakan berbagai macam jenis pembayaran mulai dari pembayaran online samapai Bayar Ditempat.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-group"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Tentang Kita</h2>
              <p>Trends Parfume memiliki beberapa cabang di indonesia, salah sataunya Trends Parfume Paledang</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2 class="mb-5">Kategori Parfurm</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/man.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Kategori</span>
                <h3>Pria</h3>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/woman.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Kategori</span>
                <h3>Wanita</h3>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/children.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Kategori</span>
                <h3>Anak-Anak</h3>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/general.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Kategori</span>
                <h3>Umum</h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2 class="mb-5">Rekomendasi Parfum</h2>
          </div>
        </div>
        <div class="row">
          <?php  
            
            //$queryBarang = mysqli_query($link, "SELECT  FROM barang ORDER BY jumlah DESC LIMIT 12");
            $sql = "SELECT barang.barang_id, barang.jumlah, barang.nama_barang, barang.spesifikasi, barang.file, barang.harga, barang.stok, rating.nilai_rating, rating.jumlah_user FROM barang JOIN rating ON barang.barang_id=rating.barang_id ORDER BY jumlah DESC LIMIT 12";
            $query = mysqli_query($link, $sql);

            $no =1;
            while ($row = mysqli_fetch_assoc($query)) {

              $nilai_rating = $row['nilai_rating'];
              $jumlah_user = $row['jumlah_user'];
              $nilaiR = $nilai_rating/$jumlah_user;



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
                    }else if($nilaiR <= 75){
                      $stars = "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star-half'></i>";
                    }else if($nilaiR <= 80){
                      $stars = "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i>";
                    }else if($nilaiR <= 90){
                      $stars = "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star-half'></i>";
                    }else if($nilaiR <= 100){
                      $stars = "<i class='icon-star'></i><i class='icon-star'><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i></i>";
                    }

              $tes = $nilaiR / 10;
          ?>
          <div class="col-md-3 rounded">
            <div class= "rounded" >
              <div class="item mb-3 rounded">
                <div class="block-4 text-center rounded">
                  <figure class="block-4-image rounded">
                    <img src="images/barang/<?php echo $row['file']; ?>" alt="Image placeholder" class="img-fluid rounded">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#"><?php echo $row['nama_barang']; ?></a></h3>
                    <p class="text-primary font-weight-bold"><?php echo rupiah($row['harga']) ?></p>
                    <div style="background-color: #ebebeb;">
                      <span>Jumlah Pembelian (<?php echo $row['jumlah']; ?>)</span><br>
                      <span>Rating <?php echo  number_format($tes,2); ?></span><br>
                      <span><?php echo $stars; ?> &nbsp; <span>( </span><?php echo $jumlah_user; ?> <span>)</span></span>
                    </div><br>
                    <p>
                    <a href="<?php echo BASE_URL."index.php?page=detail&barang_id=$row[barang_id]" ?>" class="btn btn-sm btn-primary">Detail</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php $no++; } ?>
        </div>
      </div>
    </div>
    <p class="d-flex justify-content-center">
      <a href="<?php echo BASE_URL."index.php?page=shop" ?>" class="btn btn-sm btn-primary ">Lihat barang lebih banyak</a>
    </p>
    <div class="site-section block-8 rounded-circle">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-5 site-section-heading text-center pt-4">
            <h2>Selamat Berbelanja</h2>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 mb-5">
            <a href="#"><img src="images/11.jpg" alt="Image placeholder" class="img-fluid rounded"></a>
          </div>
          <div class="col-md-12 col-lg-5 text-center pl-md-5">
            <h2><a href="#">KEUNIKAN PARFUM</a></h2>
            <p class="post-meta mb-4"> September 3, 2018</p>
            <p>Parfume dapat memberikan kenyaman, ketenangan, kesegaran, sensasi parfum bisa tersebut di dapat dari berbagai jenis parfum yang bisa anda dapatkan di Trends Perfume</p>
            <p><a href="<?php echo BASE_URL."index.php?page=shop" ?>" class="btn btn-primary btn-sm">Belanja Sekarang</a></p>
          </div>
        </div>
      </div>
    </div>