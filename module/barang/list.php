<?php

$search = isset($_GET["search"]) ? $_GET["search"] : false;

$where = "";
$search_url = "";
if ($search) {
  $search_url = "&search=$search";
  $where = "WHERE barang.nama_barang LIKE '%$search%' ";
}

?>


<div class="site-wrap">
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="../../index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Barang</strong> </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row mb-5">
            <div class="col-md-3 mb-3 mb-md-0">
              <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=barang&action=input"; ?>"><button class="btn btn-primary btn-sm btn-block">+ Tambah Barang</button></a>
            </div>
            <div class="col-md-6 mb-3 mb-md-0">

            </div>
            <div class="col-md-3 mb-3 mb-md-0">
              <form action="<?php echo BASE_URL . "index.php"; ?>" method="GET" class="site-block-top-search">
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


            $queryBarang = mysqli_query($link, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id $where ORDER BY nama_barang ASC");

            if (mysqli_num_rows($queryBarang) == 0) {
              echo "BARANG TIDAK ADA";
            } else {
            ?>
              <table class="table table-bordered">
                <thead>
                  <tr class="judul">
                    <th class="no">No.</th>
                    <th class="nama_barang">Nama barang</th>
                    <th class="kategori-barang">Kategori</th>
                    <th class="">Harga</th>
                    <th class="">Stok</th>
                    <th class="">status</th>
                    <th class="action">Action</th>
                  </tr>
                </thead>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($queryBarang)) {
                ?>
                  <tbody>
                    <tr>
                      <td class="tengah"><?php echo $no; ?></td>
                      <td><?php echo $row['nama_barang']; ?></td>
                      <td><?php echo $row['kategori'] ?></td>
                      <td class="tengah"><?php echo rupiah($row['harga']); ?></td>
                      <td class="tengah"><?php echo $row['stok']; ?></td>
                      <td class="tengah"><?php echo $row['status']; ?></td>
                      <td class="form"><a href=" <?php echo BASE_URL . "index.php?page=my_profile&module=barang&action=edit&barang_id=$row[barang_id]" ?> " class="btn btn-primary btn-sm-edit">Edit</a>
                        <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=barang&action=delete&barang_id=$row[barang_id]" ?>" class="btn btn-primary btn-sm-edit">Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; ?>
                  </tbody>
                <?php } ?>
              </table>
            <?php } ?>
          </div>
        </form>
      </div>

      <hr>
      <center>
        <h3>DAFTAR BARANG YANG KURANG LAKU </h3>
      </center>
      <hr>

      <div class="row mb-5">
        <form class="col-md-12" method="post">
          <div class="">

            <?php

            $queryBarang = mysqli_query($link, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id $where ORDER BY nama_barang ASC");

            if (mysqli_num_rows($queryBarang) == 0) {
              echo "BARANG TIDAK ADA";
            } else {

            ?>
              <table class="table table-bordered">
                <thead>
                  <tr class="judul">
                    <th class="no">No.</th>
                    <th class="nama_barang">Nama barang</th>
                    <th class="kategori-barang">Kategori</th>
                    <th class="">Harga</th>
                    <th class="">Stok</th>
                    <th class="">status</th>
                    <th class="action">Action</th>
                  </tr>
                </thead>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($queryBarang)) {

                  if ($row['stok'] >= 90) {



                ?>
                    <tbody>
                      <tr>
                        <td class="tengah"><?php echo $no; ?></td>
                        <td><?php echo $row['nama_barang']; ?></td>
                        <td><?php echo $row['kategori'] ?></td>
                        <td class="tengah"><?php echo rupiah($row['harga']); ?></td>
                        <td class="tengah"><?php echo $row['stok']; ?></td>
                        <td class="tengah"><?php echo $row['status']; ?></td>
                        <td class="form"><a href=" <?php echo BASE_URL . "index.php?page=my_profile&module=barang&action=edit&barang_id=$row[barang_id]" ?> " class="btn btn-primary btn-sm-edit">Edit</a>
                          <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=barang&action=delete&barang_id=$row[barang_id]" ?>" class="btn btn-primary btn-sm-edit">Hapus</a>
                        </td>
                      </tr>
                      <?php $no++; ?>
                    </tbody>
                <?php }
                } ?>
              </table>
            <?php } ?>
          </div>
        </form>
      </div>
    </div>
  </div>


</div>

<script src="../../js/jquery-3.3.1.min.js"></script>
<script src="../../js/jquery-ui.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/jquery.magnific-popup.min.js"></script>
<script src="../../js/aos.js"></script>

<script src="../../js/main.js"></script>

</body>

</html>