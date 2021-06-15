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


?>


	<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="row mb-5">
          <div class="col-md-12">
            <h3><center>Detail Pesanan</center></h3>
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
                    <th class="detail-pesanan-pendek">Total</th>
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
                    <td class="detail-pesanan-tengah"><?php echo rupiah($total) ?></td>
                  </tr>
                </tbody>
                  <?php 
                    $no++; 
                      } $subtotal = $subtotal + $tarif;
                   ?>
                  <tr>
                    <td class="detail-biaya" colspan="4">Biaya Pengiriman</td>
                    <td class="isi-detail-biaya"><?php echo rupiah($tarif); ?></td>
                  </tr>

                  <tr>
                    <td class="detail-biaya" colspan="4"><b>Sub total</b></td>
                    <td  class="isi-detail-biaya"><b><?php echo rupiah($subtotal); ?></b></td>
                  </tr>
              </table>
            <?php } ?>
             <hr>
             <div id="frame-keterangan-pembayaran">
              <p>Silahkan Lakukan pembayaran ke Bank ABC / OVO / DANA <br/>
                 Nomor Account : 0000-9999-8888 (a.n Trends Perfume).<br/>
                 Setelah melakukan pembayaran silahkan lakukan konfirmasi pembayaran <br>
                 <a href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id"?>"><button class="btn btn-primary">Pembayaran Online</button></a>

              </p>
              <hr>
              <p>
                Jika anda ingin melakukan pembayaran menggunakan metode pembayaran COD<br><a href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=cod&pesanan_id=$pesanan_id"?>"><button class="btn btn-primary">COD</button></a>
              </p>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

   