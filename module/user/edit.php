<?php 
  
  $user_id = $_GET['user_id'];

  $queryUser = mysqli_query($link, "SELECT * FROM user WHERE user_id='$user_id'");
  $row = mysqli_fetch_assoc($queryUser);

  $level = $row['level'];
  $nama = $row['nama'];
  $email = $row['email'];
  $phone = $row['phone'];
  $alamat = $row['alamat'];
  $status = $row['status'];

  if(isset($_POST['submit'])){

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];
    $level = $_POST['level'];
    $status = $_POST['status'];

    $update = mysqli_query($link, "UPDATE user SET  nama='$nama', 
                                                    email='$email', 
                                                    phone='$phone', 
                                                    alamat='$alamat', 
                                                    level='$level', 
                                                    status='$status' WHERE user_id='$user_id' ");
    header("location: ".BASE_URL."index.php?page=my_profile&module=user&action=list");
  }

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="../../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/magnific-popup.css">
    <link rel="stylesheet" href="../../css/jquery-ui.css">
    <link rel="stylesheet" href="../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../css/owl.theme.default.min.css">


    <link rel="stylesheet" href="../../css/aos.css">

    <link rel="stylesheet" href="../../css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="../../index.php">Home</a> <span class="mx-2 mb-0">/</span> <a href="list.php">My profile</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Kategori</strong> </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <form action="" method="POST">
          <div class="form-group row">
            <div class="col-md-12">
              <label class="text-black">Nama Lengkap</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="text-black">Email</label>
              <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="text-black">Telepon</label>
            <input name="phone" class="form-control" value="<?php echo $phone; ?>">
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="text-black">Alamat</label>
              <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label for="c_fname" class="text-black">Level</label><br>
              <span>
                <input type="radio" name="level" value="superadmin" <?php if($level == "superadmin" ){ echo "checked='true'"; } ?> >Superadmin &nbsp;&nbsp;
                <input type="radio" name="level" value="customer" <?php if($level == "customer" ){ echo "checked='true'"; } ?> > Customer
              </span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label for="c_fname" class="text-black">Status</label><br>
              <span>
                <input type="radio" name="status" value="on" <?php if($status == "on" ){ echo "checked='true'"; } ?>>On &nbsp;&nbsp;
                <input type="radio" name="status" value="off" <?php if($status == "off" ){ echo "checked='true'"; } ?>>Off
              </span>
            </div>
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