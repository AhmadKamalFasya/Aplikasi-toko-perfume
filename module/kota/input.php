<?php 
  
  if(isset($_POST['submit'])){

    $kota = $_POST['kota'];
    $tarif = $_POST['tarif'];
    $status = $_POST['status'];

    $sql = "INSERT INTO kota(kota, tarif, status) VALUES('$kota', '$tarif', '$status') ";
    $query = mysqli_query($link, $sql);

    header("location: ".BASE_URL."index.php?page=my_profile&module=kota&action=list");
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
        <form action="" method="POST">
          <div class="form-group row">
            <div class="col-md-12">
              <label for="c_fname" class="text-black">Kota</label>
              <input type="text" class="form-control" name="kota">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label for="c_fname" class="text-black">Tarif</label>
              <input type="text" class="form-control" name="tarif">
            </div>
          </div>

          <div class="form-group row">
              <div class="col-md-12">
                <label class="text-black">Status</label><br>
                <span>
                  <input type="radio" name="status" value="on"> On
                  <input type="radio" name="status" value="off"> Off
                </span>
              </div>
            </div>

          <div class="row">
            <div class="col-md-6">
              <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <button class="btn btn-primary btn-sm btn-block" type="submit" name="submit">(+) Tambah Kota</button>
                </div>
              </div>
            </div>
          </div>   
        </form>
      </div>
    </div>
  </div>

    
  </body>
</html>