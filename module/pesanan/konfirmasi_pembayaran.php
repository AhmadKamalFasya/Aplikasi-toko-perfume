<?php  
  
  include_once('function/connection.php');
  include_once('function/helper.php');


  $pesanan_id = $_GET['pesanan_id'];

  if(isset($_POST['submit'])){

    $user_id = $_SESSION['user_id'];
    $nomor_rekening = $_POST['nomor_rekening'];
    $nama_account = $_POST['nama_account'];
    $tanggal_transfer = $_POST['tanggal_transfer'];
    $status = 1;

    $queryPembayaran = mysqli_query($link, "INSERT INTO konfirmasi_pembayaran(pesanan_id, nomor_rekening, nama_account, tanggal_transfer) VALUES ('$pesanan_id', '$nomor_rekening', '$nama_account', '$tanggal_transfer')");

      $queryPembayaran = mysqli_query($link, "UPDATE pesanan SET status='1', WHERE pesanan_id='$pesanan_id'");  
    header("location: ".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");


  }

?>    
    <div class="site-section">
      <div class="container">
        <form action="" method="POST">

          <div class="form-group row">
            <div class="col-md-12">
              <label class="text-black">Nama Account</label>
              <input type="text" class="form-control" name="nama_account">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="text-black">Nomor Rekening / Nomor Telepon <span class="text-danger">*</span><i style="color:grey"> Jika anda menggunakan DANA / OVO / GOPAY</i></label>
              <input type="text" class="form-control" name="nomor_rekening">
            </div>
          </div>
          
          <div class="form-group row">
              <div class="col-md-12">
                <label class="text-black">Tanggal Transfer (Format: yyyy-mm-dd)</label><br>
                 <input type="text" class="form-control" name="tanggal_transfer">
              </div>
            </div>

          <div class="row">
            <div class="col-md-6">
              <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <button class="btn btn-primary btn-sm btn-block" type="submit" name="submit">Konfirmasi</button>
                </div>
              </div>
            </div>
          </div>   
        </form>
      </div>
    </div>
  </div>