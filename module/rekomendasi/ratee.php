  <?php 

  $queryDetail = mysqli_query($link, "SELECT barang.*, pesanan_detail.* FROM pesanan_detail JOIN barang ON barang.barang_id=pesanan_detail.barang_id GROUP BY pesanan_detail.barang_id");
  // $queryDetail = mysqli_query($link, "SELECT * FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");

  $query = mysqli_query($link, "SELECT user.nama, user.user_id FROM pesanan JOIN user ON pesanan.user_id=user.user_id");

  $row = mysqli_fetch_assoc($query);
  $nama = $row['nama'];

  if (isset($_POST['submit'])) {

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

      $x1 = 0;
      $nilaiRating = $row['nilai_rating'];
       if ($jumlah == 0) {
          $x1 = 1*$input_nilai_rating*100/5;
          $sql = "INSERT INTO rating(jumlah_user, barang_id, nama_user, nama_barang, nilai_rating) VALUES ('$pesanan_id', '1', '$input_barang_id', '$input_nama', '$input_nama_barang', '$x1')";
          $queryRate = mysqli_query($link, $sql);
       }else{
          $x1 = $nilaiRating + (1*$input_nilai_rating*100/5);
          $sql = "UPDATE rating SET jumlah_user=jumlah_user+1, barang_id='$input_barang_id', nama_user='$input_nama', nama_barang='$input_nama_barang', nilai_rating='$x1' WHERE barang_id='$input_barang_id'";

          $queryRate = mysqli_query($link, $sql);
       }

        $sql_rating  = "SELECT * FROM rating WHERE barang_id='$input_barang_id'";
        $query_rating  = mysqli_query($link, $sql_rating);
        $row_rating  = mysqli_fetch_assoc($query_rating);
        $jumlahUser = $row_rating['jumlah_user'];
        $stars = $x1/$jumlahUser;

        echo $x1;
        echo $nilaiRating;
    }


?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="row mb-5">
          <div class="col-md-12">
            <h3><center>Detail Pesanan</center></h3>
              <hr>
          </div>
            <div class="col-md-12">
              <div class="">
                <table class="table table-bordered">
                  <thead style="background-color: rgb(121, 113, 234); color: white;">
                    <tr>
                      <th class="detail-pesanan-pendek">No</th>
                      <th class="detail-pesanan-panjang">Nama User</th>
                      <th class="detail-pesanan-pendek">Nama Barang</th>
                      <th class="detail-pesanan-pendek">Harga</th>
                      <th class="detail-pesanan-panjang">Rating</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      while($rowDetail = mysqli_fetch_assoc($queryDetail)){
                     ?>
                    <tr class="isi-detail-pesanan">
                      <td class="detail-pesanan-tengah"><?php echo $no; ?></td>
                      <td class="detail-pesanan-kiri"><?php echo $nama; ?></td>
                      <td class="detail-pesanan-tengah"><?php echo $rowDetail['nama_barang']; ?></td>
                      <td class="detail-pesanan-tengah"><?php echo $rowDetail['harga']; ?></td>
                      <td class="">
                        <form action=""  method="POST">
                          <input type="hidden" name="barang_id" value="<?php echo $rowDetail['barang_id']; ?>">
                          <input type="hidden" name="nama" value="<?php echo $nama; ?>">
                          <input type="hidden" name="nama_barang" value="<?php echo $rowDetail['nama_barang']; ?>">
                          <input type="hidden" name="harga" value="<?php echo $rowDetail['harga']; ?>">
                          <input type="hidden" name="pesanan_id" value="<?php echo $pesanan_id; ?>">
                        <ul>
                          <input type="radio" name="rating" value="1"> 1 <i class="icon-star"></i> /
                          <input type="radio" name="rating" value="2"> 2 <i class="icon-star"></i> /
                          <input type="radio" name="rating" value="3"> 3 <i class="icon-star"></i> /
                          <input type="radio" name="rating" value="4"> 4 <i class="icon-star"></i> /
                          <input type="radio" name="rating" value="5"> 5 <i class="icon-star"></i>
                          <button class="btn btn-primary btn-block btn-kc" type="submit" name="submit">Beri Rate</button>
                        </ul>
                      </form>
                      </td>
                    </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('li').on('click',function(){
      $('li').removeClass('active');
      $('li').removeClass('secondary-active');
      $(this).addClass('active');
      $(this).prevAll().addClass('secondary-active');
      $
    })
  </script>