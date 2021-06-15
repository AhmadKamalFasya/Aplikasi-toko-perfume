<?php  
    
    $search = isset($_GET["search"]) ? $_GET["search"] : false;

    $where = "";
    $search_url = "";
      if($search){
        $search_url = "&search=$search";
        $where = "WHERE kategori.kategori LIKE '%$search%' ";
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
                <a href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=form"; ?>"><button class="btn btn-primary btn-sm btn-block">+ Tambah Kategori</button></a>
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
          <form class="col-md-12" method="post">
            <div class="">
              <?php 



                // $pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
                // $data_per_halaman = 3;
                // $mulai_dari = ($pagination-1) * $data_per_halaman;

                //$queryKategori = mysqli_query($link, "SELECT * FROM kategori LIMIT $mulai_dari, $data_per_halaman");

              

                $queryKategori = mysqli_query($link, "SELECT * FROM kategori $where");

                if(mysqli_num_rows($queryKategori) == 0) {
                    require_once("notfound.html");
                  }else{
                 ?>
              <table class="table table-bordered">
                <thead>
                  <tr class="judul">
                    <th class="tengah">No.</th>
                    <th class="kiri">Kategori</th>
                    <th class="tengah">Status</th>
                    <th class="action-kategori">Action</th>
                  </tr>
                </thead>
                <?php 
                  $no = 1;
                  while ($row = mysqli_fetch_assoc($queryKategori)) {
                 ?>
                <tbody>
                  <tr>
                    <td class="tengah no-kategori"><?php echo $no; ?></td>
                    <td><?php echo $row['kategori']; ?></td>
                    <td class="tengah status-kategori"><?php echo $row['status']; ?></td>
                    <td class="form-action"><a href=" <?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=form&kategori_id=$row[kategori_id]" ?> " class="btn btn-primary btn-sm-edit">Edit</a>
                    <a href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=delete&kategori_id=$row[kategori_id]" ?>" class="btn btn-primary btn-sm-edit">Hapus</a></td>
                  </tr>
                </tbody>
              <?php $no++; } ?>
              </table>
              <?php 
                  // $queryHitungKategori = mysqli_query($link, "SELECT * FROM barang");
                  // $total_data = mysqli_num_rows($queryHitungKategori);
                  // $total_halaman = ceil($total_data / $data_per_halaman);

                  // for ($i=1; $i <= $total_halaman ; $i++) { 
                  //   echo "<a href='".BASE_URL."index.php?page=my_profile&module=kategori&action=list&pagination=$i'>$i</a>";
                  // }
               } 

            ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
