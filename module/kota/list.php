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
          <div class="col-md-12 mb-0"><a href="../../index.php">Home</a> <span class="mx-2 mb-0">/</span> <a href="list.php">My profile</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Kategori</strong> </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="row mb-5">
              <div class="col-md-3 mb-3 mb-md-0">
                <a href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=input"; ?>"><button class="btn btn-primary btn-sm btn-block">+ Tambah Kota</button></a>
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

                $queryKota = mysqli_query($link, "SELECT * FROM kota $where");
                if(mysqli_num_rows($queryKota) == 0) {
                    require_once("notfound.html");
                  }else{
              ?>
              <table class="table table-bordered">
                <thead>
                  <tr class="judul-kota">
                    <th class="tengah">No.</th>
                    <th class="kiri-kota">Kota</th>
                    <th class="tengah-kota">Tarif</th>
                    <th class="tengah-kota">Status</th>
                    <th class="tengah-kota">Action</th>
                  </tr>
                </thead>
                <?php 
                  $no = 1;
                  while($row = mysqli_fetch_assoc($queryKota)){
                 ?>
                <tbody>
                  <tr>
                    <td class="isi-kota-tengah"><?php echo $no; ?></td>
                    <td class="isi-kota-kiri"><?php echo $row['kota']; ?></td>
                    <td class="isi-kota-tengah"><?php echo $row['tarif']; ?></td>
                    <td class="isi-kota-tengah"><?php echo $row['status']; ?></td>
                    <td class="isi-kota-tengah "><a href=" <?php echo BASE_URL."index.php?page=my_profile&module=kota&action=edit&kota_id=$row[kota_id]" ?> " class="btn btn-primary btn-sm-edit my-1" style="width: 83.2px;">Edit</a> <a href=" <?php echo BASE_URL."index.php?page=my_profile&module=kota&action=delete&kota_id=$row[kota_id]" ?> " class="btn btn-primary btn-sm-edit my-1">Hapus</a></td>
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