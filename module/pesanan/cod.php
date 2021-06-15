<?php  
  
  include_once('function/connection.php');
  include_once('function/helper.php');


  $pesanan_id = $_GET['pesanan_id'];

  if(isset($_POST['submit'])){

    $user_id = $_SESSION['user_id'];
    $nomor_rekening = "-";
    $nama_account = $_POST['nama_account'];
    $tanggal_transfer = "COD";
    $status = 1;

    $queryPembayaran = mysqli_query($link, "INSERT INTO konfirmasi_pembayaran(pesanan_id, nomor_rekening, nama_account, tanggal_transfer) VALUES ('$pesanan_id', '$nomor_rekening', '$nama_account', '$tanggal_transfer')");
    
     $queryPembayaran = mysqli_query($link, "UPDATE pesanan SET status='1' WHERE pesanan_id='$pesanan_id'");  
     header("location: ".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");

  }

?>    
    <div class="site-section">
      <div class="container">
        <form action="" method="POST">

          <div class="form-group row">
            <div class="col-md-12">
              <label class="text-black">Konfirmasi Nama Penerima</label>
              <input type="text" class="form-control" name="nama_account">
            </div>
          </div>
          
          <input type="text" class="form-control" name="nomor_rekening" hidden="">
          <input type="text" class="form-control" name="tanggal_transfer" hidden="">

          <p>Apabila anda sudah yakin ingin melakukan pembayaran dengan menggunakan metode COD klik tombol dibawah ini</p>
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