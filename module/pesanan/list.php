<?php  

 $search = isset($_GET["search"]) ? $_GET["search"] : false;

    $where = "";
    $search_url = "";

    if ($search) {
      $search_url = "&search=$search";
      $where = "WHERE user.nama LIKE '%$search%' ";
   }




?>
  <div class="site-wrap">
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="../../index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Pesanan</strong> </div>
        </div>
      </div>
    </div>

   

    <div class="site-section">
      <div class="container">
          <div class="row mb-5">
            <div class="col-md-3"></div>
            <div class="col-md-6"></div>
            <div class="col-md-3">
            <form action="<?php echo BASE_URL."index.php"; ?>" method="GET" class="site-block-top-search">
              <?php if ($level == "superadmin"){ ?>
              <span class="icon icon-search2"></span>
              <input type="hidden" name="page" value="<?php echo $_GET["page"]; ?>">
              <input type="hidden" name="module" value="<?php echo $_GET["module"]; ?>">
              <input type="hidden" name="action" value="<?php echo $_GET["action"]; ?>">
                <input type="text" value="<?php echo $search; ?>" class="form-control border-0" placeholder="Search" name="search">
              <?php } ?>
            </form>
          </div>
                      
            <div class="">
              <?php 

                if ($level == "superadmin") {
                  
                  $queryPesanan = mysqli_query($link, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id $where ORDER BY pesanan.tanggal_pemesanan DESC");
                }else{
                  $queryPesanan = mysqli_query($link, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id $where WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan DESC");
                }

                if(mysqli_num_rows($queryPesanan) == 0) {
                    require_once("notfound.html");
                  }else{
              ?>
              <table class="table table-bordered">
                <thead>
                  <tr class="judul-kota">
                    <th class="">No Pesanan</th>
                    <th class="">Nama</th>
                    <th class="">Status</th>
                    <th class="">Action</th>
                  </tr>
                </thead>
                <?php 
                  $adminButton = "";

                  while($row = mysqli_fetch_assoc($queryPesanan)){
                    if($level == "superadmin"){
                      $adminButton = "<br><br> <a class='btn btn-primary btn-sm-edit' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Update Status</a>";
                    }

                  $status = $row['status'];
                  $rating = "<a class='btn btn-primary btn-sm-edit' href='".BASE_URL."index.php?page=my_profile&module=rekomendasi&action=rating&pesanan_id=$row[pesanan_id]'>Rating</a>";

                 ?>
                <tbody>
                  <tr>
                    <td class="ps-pesanan"><?php echo $row['pesanan_id']; ?></td>
                    <td class="ps-nama"><?php echo $row['nama']; ?></td>
                    <td class="ps-status"><?php echo $arrayStatusPesanan[$status]; ?></td>
                    <td class="ps-detail">
                      <a href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]" ?>" class="btn btn-primary btn-sm-edit">Detail Pesanan</a>
                      <?php echo $adminButton; ?><br><br>
                      <?php   
                     if ($status == 2 ) { ?>
                      <?php if ($level == "customer"){ ?>
                        
                      <!--  <a href="<?php echo BASE_URL."index.php?page=my_profile&module=rekomendasi&action=rating&pesanan_id=$row[pesanan_id]" ?>" class="btn btn-primary btn-sm-edit">Rating</a> -->
                      <?php echo $rating; ?>
                      <?php } ?>
                     <?php } ?>
                  </tr>
                </tbody>
                <?php }?>
              </table>
            <?php } ?>
            </div>
        </div>
      </div>
    </div>
  </div>
