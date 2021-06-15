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
            <h2 class="h3 mb-3 text-black">Login</h2>
            <div class="p-3 p-lg-5 border">

            <form action="<?php echo BASE_URL."proses_login.php"; ?>" method="POST">

              <?php 
                $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

                if($notif == "true"){
                  echo "<div class='notif'>Maaf, email atau password kamu tidak cocok </div>";
                }

               ?>

               <div class="form-group row">
                <div class="col-md-12">
                  <label class="text-black">Email <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="email" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label class="text-black">Password <span class="text-danger">*</span></label>
                  <input type="Password" class="form-control" name="password" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-4">
                  <button class="btn btn-primary btn-sm" type="submit" value="login" id="button-addon2">Login</button>
                </div>
              </div>
            </form>
            </div>
          </div>
          <div class="col-md-6">

            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Spirit With Love Fragrance</h2>
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