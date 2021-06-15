<?php  

  $pesanan_id = $_GET['pesanan_id'];

  $query = mysqli_query($link, "SELECT * FROM pesanan WHERE pesanan_id='$pesanan_id'");
  $row = mysqli_fetch_assoc($query);
  $tampilstatus = $row['status'];


  if(isset($_POST['submit'])) {
    $status = $_POST['status'];

    mysqli_query($link, "UPDATE pesanan SET status='$status' WHERE pesanan_id='$pesanan_id' ");
    
    if($status == 2){
      $queryStatus = mysqli_query($link, "SELECT * FROM pesanan_detail WHERE pesanan_id='$pesanan_id'");
      while ($rowStatus = mysqli_fetch_assoc($queryStatus)) {
        $barang_id = $rowStatus['barang_id'];
        $quantity = $rowStatus['quantity'];
        
        //Query Barang
        $sqlBarang = "SELECT * FROM barang WHERE barang_id='$barang_id'";
        $query = mysqli_query($link, $sqlBarang);
        $rowBarang = mysqli_fetch_assoc($query);

        $jumlah = $rowBarang['jumlah'] + 1;
        mysqli_query($link, "UPDATE barang SET stok=stok-$quantity, jumlah=$jumlah WHERE barang_id='$barang_id'"); 
      }

    }
    header("location: ".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");
  }


?>

    <div class="site-section">
      <div class="container">
         <form action="" method="POST"> 
          <div class="form-group row">
            <div class="col-md-12">
              <label class="text-black ">Pesanan ID (Faktur ID)</label>
              <input type="text" class="form-control" name="pesanan_id" value="<?php echo $pesanan_id;?>" readonly="ture">
            </div>
          </div>

          <div class="form-group">
             <label class="text-black">Status <span class="text-danger">*</span></label>
                <select class="form-control" name="status">
                  <?php 
                    foreach ($arrayStatusPesanan as $key => $value) {
                      if($tampilstatus == $key){
                  ?> 
                    <option value="<?= $key; ?>" selected="true"><?php echo $value; ?></option>  
                    <?php }else{ ?> 
                    <option value="<?= $key; ?>"><?php echo $value; ?></option>  
                    <?php } ?>   
                  <?php } ?>
                </select>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <button class="btn btn-primary btn-sm btn-block" type="submit" name="submit">Update</button>
                </div>
              </div>
            </div>
          </div>   
        </form>
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