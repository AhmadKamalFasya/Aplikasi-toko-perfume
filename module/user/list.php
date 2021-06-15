<?php  

 $search = isset($_GET["search"]) ? $_GET["search"] : false;

    $where = "";
    $search_url = "";

    if ($search) {
      $search_url = "&search=$search";
      $where = "WHERE user.nama LIKE '%$search%' ";
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
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6"></div>
          <div class="col-md-3">
            <form action="<?php echo BASE_URL."index.php"; ?>" method="GET" class="site-block-top-search">
              <span class="icon icon-search2"></span>
              <input type="hidden" name="page" value="<?php echo $_GET["page"]; ?>">
              <input type="hidden" name="module" value="<?php echo $_GET["module"]; ?>">
              <input type="hidden" name="action" value="<?php echo $_GET["action"]; ?>">
              <input type="text" value="<?php echo $search; ?>" class="form-control border-0" placeholder="Search" name="search">
            </form>
          </div>
          <div class="col-md-12">
            <div class="">
              <?php 
                $queryUser = mysqli_query($link, "SELECT * FROM user $where");
                if(mysqli_fetch_assoc($queryUser) == 0) {
                  require_once("notfound.html");
                }else{
              ?>
              <table class="table table-bordered">
                <thead>
                  <tr class="judul-user">
                    <th class="">No.</th>
                    <th class="">Nama</th>
                    <th class="">Email</th>
                    <th class="">Telepon</th>
                    <th class="">Level</th>
                    <th class="">Status</th>
                    <th class="">Action</th>
                  </tr>
                </thead>
                <?php  
                  $no = 1;
                  while($row = mysqli_fetch_assoc($queryUser)){
                ?>
                <tbody>
                  <tr>
                    <td class="isi-user-tengah"><?php echo $no; ?></td>
                    <td class="isi-user-kiri"><?php echo $row['nama']; ?></td>
                    <td class="isi-user-kiri"><?php echo $row['email']; ?></td>
                    <td class="isi-user-kiri"><?php echo $row['phone']; ?></td>
                    <td class="isi-user-tengah"><?php echo $row['level']; ?></td>
                    <td class="isi-user-tengah"><?php echo $row['status']; ?></td>
                    <td class="isi-user-tengah"><a href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=edit&user_id=$row[user_id]" ?>" class="btn btn-primary btn-sm my-1" style="width: 95px;">Edit</a> <a href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=delete&user_id=$row[user_id]" ?> " class="btn btn-primary btn-sm my-1">Hapus</a></td>
                  </tr>
                </tbody>
                <?php $no++; } ?>
              </table>
            <?php } ?>
            </div>
          </div>
        </div>
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