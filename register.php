<?php 

  if ($user_id) {
    header("location: ".BASE_URL);
  }

 ?>
  <div class="site-wrap">

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Register</h2>
            <div class="p-3 p-lg-5 border">

            <form action="<?php echo BASE_URL."proses_register.php"; ?>" method="POST">

              <?php 
                $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
                $nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
                $email = isset($_GET['email']) ? $_GET['email'] : false;
                $phone = isset($_GET['phone']) ? $_GET['phone'] : false;
                $alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;

                if($notif == "require"){
                  echo "<div class='notif'>Maaf, Kamu harus melengkapi form dibawah ini </div>";
                }

               ?>

              <div class="form-group row">
                <div class="col-md-12">
                  <label class="text-black">Username <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>"/>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label class="text-black">Password <span class="text-danger">*</span></label>
                  <input type="Password" class="form-control" name="password" />
                </div>
                <div class="col-md-6">
                  <label class="text-black">Re-Password <span class="text-danger">*</span></label>
                  <input type="Password" class="form-control" name="re_password" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label class="text-black">Email <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="email" value="<?php echo $email; ?>"/>
                </div>
                <div class="col-md-6">
                  <label class="text-black">Telepon <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_diff_address" class="text-black">Alamat <span class="text-danger">*</span></label>
                   <input type="text" class="form-control" id="c_diff_address" name="alamat" value="<?php echo $alamat; ?>">
                 </div>
              </div>

              <div class="form-group row">
                <div class="col-md-4">
                  <button class="btn btn-primary btn-sm" type="submit" value="register" id="button-addon2">Daftar</button>
                </div>
              </div>
            </form>
            </div>
          </div>
          <div class="col-md-6">

             <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Parfum memberikan kesegaran</h2>
                <div class="border">
                  <picture>
                    <source srcset="" type="image/svg+xml">
                    <img src="images/perfume_1.png" class="img-fluid img-thumbnail" alt="responsive image">
                  </picture>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- </form> -->
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
    
  </body>
</html>