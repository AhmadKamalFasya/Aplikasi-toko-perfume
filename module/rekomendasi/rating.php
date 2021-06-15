<?php  

	$pesanan_id = $_GET["pesanan_id"];

	$queryPesanan = mysqli_query($link, "SELECT pesanan.nama_penerima, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pemesanan, user.nama, kota.kota, kota.tarif FROM pesanan JOIN user ON pesanan.user_id=user.user_id JOIN kota ON kota.kota_id=pesanan.kota_id WHERE pesanan.pesanan_id='$pesanan_id'");

	$row = mysqli_fetch_assoc($queryPesanan);

	$tanggal_pemesanan = $row['tanggal_pemesanan'];
	$nama_penerima = $row['nama_penerima'];
	$nomor_telepon = $row['nomor_telepon'];
	$alamat = $row['alamat'];
	$tarif = $row['tarif'];
	$nama = $row['nama'];
	$kota = $row['kota'];

   if (isset($_POST['submit'])) {

      $input_barang_id = $_POST['barang_id'];
      $input_nama = $_POST['nama'];
      $input_nama_barang = $_POST['nama_barang'];
      $input_nilai_rating = $_POST['rating'];
      
      $sql  = "SELECT * FROM rating WHERE barang_id='$  '";
      $query  = mysqli_query($link, $sql);
      $row  = mysqli_fetch_assoc($query);
      
      $jumlah = mysqli_num_rows($query);

      $x1 = 0;
      $nilaiRating = $row['nilai_rating'];
       if ($jumlah == 0) {
          $x1 = 1*$input_nilai_rating*100/5*1;
          $sql = "INSERT INTO rating(jumlah_user, barang_id, nama_user, nama_barang, nilai_rating) VALUES ('$pesanan_id', '1', '$input_barang_id', '$input_nama', '$input_nama_barang', '$x1')";
          $queryRate = mysqli_query($link, $sql);
       }else{
          $x1 = $nilaiRating + (1*$input_nilai_rating*100/5*1);
          $sql = "UPDATE rating SET jumlah_user=jumlah_user+1, barang_id='$input_barang_id', nama_user='$input_nama', nama_barang='$input_nama_barang', nilai_rating='$x1' WHERE barang_id='$input_barang_id'";

          $queryRate = mysqli_query($link, $sql);
       }

        $sql_rating  = "SELECT * FROM rating WHERE barang_id='$input_barang_id'";
        $query_rating  = mysqli_query($link, $sql_rating);
        $row_rating  = mysqli_fetch_assoc($query_rating);
        $jumlahUser = $row_rating['jumlah_user'];
        $stars = $x1/$jumlahUser;

         header("location: ".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");

    }


?>


	<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="row mb-5">
          <div class="col-md-12 col-sm-12">
            <h3><center>Rating</center></h3>
              <hr>
                <?php  
                  if(mysqli_num_rows($queryPesanan) == 0) {
                    require_once("notfound.html");
                  }else{
                ?>
                <table>
                  <tr>
                    <td class="isi-detail-h">Nomor Faktur</td>
                    <td class="titik-2">:</td>
                    <td class="isi-detail-b"><?php echo $pesanan_id; ?></td>
                  </tr>
                  <tr>
                    <td class="isi-detail-h">Nama Pemesan</td>
                    <td class="titik-2">:</td>
                    <td class="isi-detail-b"><?php echo $nama; ?></td>
                  </tr>
                  <tr> 
                    <td class="isi-detail-h">Nama Penerima</td>
                    <td class="titik-2">:</td>
                    <td class="isi-detail-b"><?php echo $nama_penerima; ?></td>
                  </tr>
                  <tr>
                    <td class="isi-detail-h">Alamat</td>
                    <td class="titik-2">:</td>
                    <td class="isi-detail-b"><?php echo $alamat; ?></td>
                  </tr>
                  <tr>
                    <td class="isi-detail-h">Nomor Telepon</td>
                    <td class="titik-2">:</td>
                    <td class="isi-detail-b"><?php echo $nomor_telepon; ?></td>
                  </tr>   
                  <tr>
                    <td class="isi-detail-h">Tanggal Pemesanan</td>
                    <td class="titik-2">:</td>
                    <td class="isi-detail-b"><?php echo $tanggal_pemesanan; ?></td>
                  </tr>   
                </table>  
              <?php } ?>
              <hr>
          </div>
          <div class="col-md-12">
            <div class="">
              <?php  

                if(mysqli_num_rows($queryPesanan) == 0) {
                  require_once("notfound.html");
                }else{
              ?>
              <table class="table table-bordered">
                <thead style="background-color: rgb(121, 113, 234); color: white;">
                  <tr>
                    <th class="detail-pesanan-pendek">No</th>
                    <th class="detail-pesanan-panjang">Nama Barang</th>
                    <th class="detail-pesanan-pendek">Quantity</th>
                    <th class="detail-pesanan-pendek">Harga Satuan</th>
                    <th class="detail-pesanan-pendek">Rating</th>
                  </tr>
                </thead>
                  <?php  
                    $queryDetail = mysqli_query($link, "SELECT * FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");
                   
                    $no = 1;
                    $subtotal = 0;
                    while($rowDetail = mysqli_fetch_assoc($queryDetail)){

                    
                    $total = $rowDetail['harga'] * $rowDetail['quantity'];
                    $subtotal = $subtotal + $total;

                  ?>
                <tbody>
                  <tr class="isi-detail-pesanan">
                    <td class="detail-pesanan-tengah"><?php echo $no; ?></td>
                    <td class="detail-pesanan-kiri"><?php echo $rowDetail['nama_barang']; ?></td>
                    <td class="detail-pesanan-tengah"><?php echo $rowDetail['quantity']; ?></td>
                    <td class="detail-pesanan-tengah"><?php echo rupiah($rowDetail['harga']) ?></td>
                    <td class="detail-pesanan-tengah">
                      <form action=""  method="POST" class="sm-5">
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
                </tbody>
                  <?php 
                    $no++; 
                      } $subtotal = $subtotal + $tarif;
                   ?>
              </table>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

   