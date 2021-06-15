<?php 

   $search = isset($_GET["search"]) ? $_GET["search"] : false;

    $where = "";
    $search_url = "";

    if ($search) {
      $search_url = "&search=$search";
      $where = "WHERE kota.kota LIKE '%$search%' ";
   }

 ?>
  <div class="site-wrap">
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="../../index.php">Home</a><span class="mx-2 mb-0">/</span> <strong class="text-black">Rating</strong> </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="row mb-5">
              <div class="col-md-3 mb-3 mb-md-0">
              </div>
              <div class="col-md-6 mb-3 mb-md-0">
              </div>

              <div class="col-md-3 mb-3 mb-md-0">
                <form action="<?php echo BASE_URL."index.php"; ?>" method="GET" class="site-block-top-search">
                  <span class="icon icon-search2"></span>
                  <input type="hidden" name="page" value="<?php echo $_GET["page"]; ?>">
                  <input type="hidden" name="module" value="<?php echo $_GET["module"]; ?>">
                  <input type="hidden" name="action" value="<?php echo $_GET["action"]; ?>">
                  <input type="text" value="<?php echo $search; ?>" class="form-control border-0" placeholder="Search" name="search">
                </form>
              </div>
            </div>
          </div>
        </div>  
          <div class="row mb-5">
            <div class="">
              <?php 

                if ($level == "superadmin") {
                  $queryRating = mysqli_query($link, "SELECT * FROM rating");
                }
                if( 1 == 0) {
                    require_once("notfound.html");
                  }else{
              ?>

              <?php ?>
              <table class="table table-bordered">
                <thead>
                  <tr class="judul-kota">
                    <th class="tengah">No.</th>
                    <th class="tengah-kota">Barang ID</th>
                    <th class="kiri-kota">Nama Barang</th>
                    <th class="tengah-kota">Nilai Rating</th>
                    <th class="tengah-kota">Star Rate</th>
                  </tr>
                </thead>
                <?php 
                  $no = 1;
                  while($row = mysqli_fetch_assoc($queryRating)){


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
                    }else if($nilaiR <= 70){
                      $stars = "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star-half'></i>";
                    }else if($nilaiR <= 80){
                      $stars = "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i>";
                    }else if($nilaiR <= 90){
                      $stars = "<i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i>";
                    }else if($nilaiR <= 100){
                      $stars = "<i class='icon-star'></i><i class='icon-star'><i class='icon-star'></i><i class='icon-star'></i><i class='icon-star'></i></i>";
                    }

                    
                 ?>
                <tbody>
                  <tr>
                    <td class="isi-kota-tengah"><?php echo $no; ?></td>
                    <td class="isi-kota-kiri"><?php echo $row['barang_id']; ?></td>
                    <td class="isi-kota-tengah"><?php echo $row['nama_barang']; ?></td>
                    <td class="isi-kota-tengah"><?php echo number_format($nilaiR); ?>%</td>
                    <td class="isi-kota-tengah"><?php echo $stars; ?></td>
                  </tr>
                </tbody>
                <?php $no++; }?>
              </table>
            <?php } ?>
            </div>
        </div>
      </div>
    </div>
  </div>