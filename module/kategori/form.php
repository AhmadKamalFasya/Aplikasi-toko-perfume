<?php

$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

$kategori = "";
$status = "";
$button = "(+) Tambah Kategori";

if ($kategori_id) {
  $queryKategori = mysqli_query($link, "SELECT * FROM kategori WHERE kategori_id='$kategori_id' ");
  $row = mysqli_fetch_assoc($queryKategori);

  $kategori = $row['kategori'];
  $status = $row['status'];
  $button = "Update";
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
      <form action="<?php echo BASE_URL . "module/kategori/action.php?kategori_id=$kategori_id"; ?>" method="POST">
        <div class="form-group row">
          <div class="col-md-12">
            <label class="text-black">Kategori</label>
            <input type="text" class="form-control" name="kategori" value="<?php echo $kategori; ?>">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <label class="text-black">Status</label><br>
            <span>
              <input type="radio" name="status" value="on" <?php if ($status == "on") {
                                                              echo "checked='true'";
                                                            } ?> /> On
              <input type="radio" name="status" value="off" <?php if ($status == "off") {
                                                              echo "checked='true'";
                                                            } ?> /> Off
            </span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block" type="submit" name="button" value="<?php echo $button; ?>"><?php echo $button; ?></button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>