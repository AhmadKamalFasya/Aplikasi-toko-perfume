<?php  

  unset($_SESSION["keranjang"]);

  $pesanan_id = $_GET["pesanan_id"];

  $queryDetail = mysqli_query($link, "SELECT barang.*, pesanan_detail.* FROM pesanan_detail JOIN barang ON barang.barang_id=pesanan_detail.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");
  // $queryDetail = mysqli_query($link, "SELECT * FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");

  $query = mysqli_query($link, "SELECT user.nama, user.user_id FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.pesanan_id='$pesanan_id'");

  $row = mysqli_fetch_assoc($query);
  $nama = $row['nama'];

  if (isset($_POST['submit'])) {

      $input_user_id = $_POST['user_id'];
      $input_barang_id = $_POST['barang_id'];
      $input_nama = $_POST['nama'];
      $input_nama_barang = $_POST['nama_barang'];
      $input_nilai_rating = $_POST['rating'];
      
      $sql  = "SELECT * FROM rating WHERE barang_id='$input_barang_id'";
      $query  = mysqli_query($link, $sql);
      $row  = mysqli_fetch_assoc($query);
      
      $jumlah = mysqli_num_rows($query);
      if($jumlah == 0){

      }

      $nilaiRating = $row['nilai_rating'];
       if ($jumlah == 0) {
          $x1 = 1*$input_nilai_rating*100/5;
          $sql = "INSERT INTO rating(pesanan_id, jumlah_user, barang_id, nama_user, nama_barang, nilai_rating) VALUES ('$pesanan_id', '1', '$input_barang_id', '$input_nama', '$input_nama_barang', '$x1')";
          $queryRate = mysqli_query($link, $sql);
       }else{
          $x1 = $nilaiRating + (1*$input_nilai_rating*100/5);
          $sql = "UPDATE rating SET pesanan_id='$pesanan_id', jumlah_user=jumlah_user+1, barang_id='$input_barang_id', nama_user='$input_nama', nama_barang='$input_nama_barang', nilai_rating='$x1' WHERE barang_id='$input_barang_id'";

          $queryRate = mysqli_query($link, $sql);
       }

        $sql_rating  = "SELECT * FROM rating WHERE barang_id='$input_barang_id'";
        $query_rating  = mysqli_query($link, $sql_rating);
        $row_rating  = mysqli_fetch_assoc($query_rating);
        $jumlahUser = $row_rating['jumlah_user'];
        $stars = $x1/$jumlahUser;

    }

      while($rowDetail = mysqli_fetch_assoc($queryDetail)){

?>
  
  <div class="site-section">
      <div class="container">
        <?php  
             
            $no = 1;
            $subtotal = 0;

        ?>
        <form action="" method="POST">

          <?php  
            $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
            $rating = isset($_GET['rating']) ? $_GET['rating'] : false;
            
             if($notif == "require"){
                  echo "<div class='notif'>Maaf, Kamu harus melengkapi form dibawah ini </div>";
                }
          ?>
          <center>
          <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <img src="images/barang/<?php echo $rowDetail['file']; ?>" alt="Image" class="img-thumbnail">
          </div>
          </center>

          <div class="form-group row" hidden="">
            <div class="col-md-12">
              <label for="c_fname" class="text-black">User</label>
              <input type="text" class="form-control" name="user_id" value="<?php echo $row['user_id']; ?>" readonly>
            </div>
          </div>

          <div class="form-group row" hidden="">
            <div class="col-md-12">
              <label for="c_fname" class="text-black">Barang Id</label>
              <input type="text" class="form-control" name="barang_id" value="<?php echo $rowDetail['barang_id']; ?>" readonly>
            </div>
          </div>

  
          <div class="form-group row">
            <div class="col-md-12">
              <label for="c_fname" class="text-black">User</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" readonly>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label for="c_fname" class="text-black">Nama Barang</label>
              <input type="text" class="form-control" name="nama_barang" value="<?php echo $rowDetail['nama_barang']; ?>" readonly>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label for="c_fname" class="text-black">Harga</label>
              <input type="text" class="form-control" name="" value="<?php echo $rowDetail['harga']; ?>" readonly>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label for="c_fname" class="text-black">Spesifikasi</label>
              <input type="text" class="form-control" name="" value="<?php echo $rowDetail['spesifikasi']; ?>" readonly>
            </div>
          </div>


          <div class="form-group row">
              <div class="col-md-12">
                <label class="text-black">Rating</label><br>
                <span>
                  <p>Beri nilai dari 1 sampai 5</p>
                  <input type="radio" name="rating" value="1"> 1 <i class="icon-star"></i> /
                  <input type="radio" name="rating" value="2"> 2 <i class="icon-star"></i> /
                  <input type="radio" name="rating" value="3"> 3 <i class="icon-star"></i> /
                  <input type="radio" name="rating" value="4"> 4 <i class="icon-star"></i> /
                  <input type="radio" name="rating" value="5"> 5 <i class="icon-star"></i>
                </span>
              </div>
            </div>

          <div class="row">
            <div class="col-md-6">
              <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <button class="btn btn-primary btn-sm btn-block" type="submit" name="submit">Beri Rate</button>
                </div>
              </div>
            </div>
          </div> 
           <?php 
                    $no++; }
                   ?>  
        </form>
      </div>
    </div>