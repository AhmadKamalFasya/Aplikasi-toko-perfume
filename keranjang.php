<?php  
  error_reporting(0);
?>
  
  <div class="site-wrap">
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Keranjang</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
                <?php 

                  if($totalBarang == 0){
                    require_once("notfound.html");
                  }else{
                    $no = 1;
                ?>
                    <table class='table table-bordered'>
                        <thead>
                        <tr class="baris-title">
                          <th class="tengah">No</th>
                          <th class="product-name">Nama Barang</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-price">Harga Satuan</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                        </tr>
                        <thead>
                        <?php 

                          $subtotal = 0;
                          foreach($keranjang AS $key => $value){
                            $barang_id = $key;

                            $nama_barang = $value["nama_barang"]; 
                            $quantity = $value["quantity"];
                            $file = $value["file"];
                            $harga = $value["harga"];

                            $total = $quantity * $harga;
                            $subtotal = $subtotal + $total;

                        ?>
                          <tr>
                            <td class="tengah"><?php echo $no; ?></td>
                            <td class="product-name"><?php echo $nama_barang; ?></td>
                            <td class="text-center"><input type="text" name="<?php echo $barang_id; ?>" value="<?php echo $quantity ?>" class="update-quantity form-control text-center" /></td>
                            <td class="kanans"><?php echo rupiah($harga) ?></td>
                            <td class="kanans hapus_item" ><?php echo rupiah($total) ?></td>
                            <td><a href="<?php echo BASE_URL."hapus_item.php?barang_id=$barang_id" ?>">X</a></td>
                            </tr>
                        <?php $no++; } ?>
                    </table>
                  <?php } ?>
            </div>
          </form>
        </div>
        <?php  
            if($totalBarang == 0){
                    echo "";
                  }else{
        ?>
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6">
                <a href="<?php echo BASE_URL."index.php?page=shop" ?>"><button class="btn btn-outline-primary btn-sm btn-block">Lanjutkan Belanja</button></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Keranjang Total</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black"><?php echo Rupiah($subtotal) ?></strong>
                  </div>
                </div><br>

                <div class="row">
                  <div class="col-md-12">
                    <a href="<?php echo BASE_URL."index.php?page=data_pemesan" ?>"><button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.html'">Lanjut Pembayaran</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>

    
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>

  <script>

  $(".update-quantity").on("input", function(e){
    var barang_id = $(this).attr("name");
    var value = $(this).val();
    
    $.ajax({
      method: "POST",
      url: "update_keranjang.php",
      data: "barang_id="+barang_id+"&value="+value
    })
    .done(function(data){
      location.reload();
    });
    
  });

</script>
  </body>
</html>