<?php 
    session_start(); 
    include '../koneksi/koneksi.php';
    if (isset($_SESSION['admin'])) 
    {
      header("location:index?halaman=beranda");
  }
?>
<!doctype html>
    <html lang="en">
    
    <head>

        <meta charset="utf-8" />
        <title>Login Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <p class="text-muted">Sign in</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="" method="post">

                                        <div class="mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password">
                                        </div>

                                        <button name="masuk" class="btn btn-success mt-4" style="margin-left: 20px; margin-right: 30px; width: 94%; background: linear-gradient(
                                            60deg, #ab47bc, #7b1fa2);">MASUK</button>
                                        </form>
                                        <?php 
                                            if (isset($_POST['masuk'])) 
                                            {

                                              $username = mysqli_escape_string($koneksi,$_POST['username']);
                                              $password = MD5(mysqli_escape_string($koneksi,$_POST['password']));

                                              $ambil = $koneksi->query("SELECT * FROM admin WHERE username = '$username' AND password = '$password' ");
                                              $cocok = $ambil->num_rows;

                                              if ($cocok==1) 
                                              {
                                                $akun = $ambil->fetch_assoc();
                                                $_SESSION['admin'] = $akun;
                                                $_SESSION['id_admin'] = $akun['id_admin'];
                                               
                                                $_SESSION['nama_lengkap'] = $akun['nama_lengkap'];
                                                
                                                echo "<script>alert('Anda berhasil Masuk');
                                                document.location='index?halaman=beranda'</script>";
                                            
                                            }else{
                                            echo "<script>alert('Anda gagal Masuk');
                                            document.location='masuk'</script>";
                                  }
                              }
                          ?>

                      </div>

                  </div>
              </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- end container -->
</div>


<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

<section>
    <div class="copyright text-center">
        <p>&copy; Copyright 2022 By <i class="fa fa-heart text-danger"></i>Raditya</p>
    </div>
</section>

</body>
</html>
