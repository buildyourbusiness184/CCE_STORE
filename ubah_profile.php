<?php 
session_start();

include 'koneksi/koneksi.php';
//jika tidak ada session pelanggan(belum login)
if(!isset($_SESSION["pelanggan"]))
{
  echo "<script>alert('Silahkan Login');</script>";
    echo "<script>location='login.php';</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>


</head>
<body>
	<div class="container-fluid">
		<div class="row top">
			<center>
				<div class="col-md-4" style="padding: 3px;">
					<span> <i class="glyphicon glyphicon-earphone"></i> <?=$hp ?></span>
				</div>


				<div class="col-md-4"  style="padding: 3px;">
					<span><i class="glyphicon glyphicon-envelope"></i><?= $email ?></span>
				</div>


				<div class="col-md-4"  style="padding: 3px;">
					<span> Indonesia</span>
				</div>
			</center>
		</div>
	</div>
	<!-- NAV START -->

	<nav class="navbar navbar-default" style="padding: 5px;">
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#" style="color: #ff8680"><b><?= $title ?> STORE</b></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
		<li><a href="index.php">Home</a></li>
		<li><a href="produk.php">Produk</a></li>
		<!-- <li><a href="about.php">Tentang Kami</a></li> -->
		<li><a href="manual.php">Manual Aplikasi</a></li>
		<li><a href="keranjang.php">Keranjang</a></li>


		<?php 
		if(!isset($_SESSION['pelanggan'])){
			?>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> Akun <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="user_login.php">login</a></li>
					<li><a href="register.php">Register</a></li>
					<li><a href="admin/masuk.php">Admin</a></li>
				</ul>
			</li>
			<?php 
		}else{
			?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?= $_SESSION['nama_pelanggan']; ?> <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="profile.php">profile</a></li>
					<li><a href="proses/logout.php">Log Out</a></li>
				</ul>
			</li>

			<?php 
		}
		?>
	</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>	


	<div class="my-account-area  pt-80 pb-80">
			<div class="container">	
				<div class="my-account">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="panel-group" id="accordion">
								<div class="panel">
									<div class="my-account-menu" >
										<a  data-toggle="collapse" data-parent="#accordion" href="#my-info" >
											Ubah Data
										</a>
									</div>
									<?php 

//koding MySQL ubah data (ngambil dari ID pelanggan yang masuk)

									$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
									$ubahdata = $ambil->fetch_assoc();

									?>
									<?php 
// echo "<pre>";
// print_r($ubahdata);
// echo "</pre>";
								?>
								<form method="POST" enctype="multipart/form-data" class="form-horizontal">
									<br>
									<div class="form-group">
										<label class="control-label col-md-3">Nama</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $ubahdata['nama_pelanggan']; ?>" required>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Email</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $ubahdata['email_pelanggan']; ?>" required>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Password</label>
										<div class="col-md-7">
											<input type="password" class="form-control" name="password" placeholder="Password Sebelumnya" value="<?php echo $ubahdata['password_pelanggan']; ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">
											Alamat
										</label>
										<div class="col-md-7">
											<textarea name="alamat" placeholder="Masukkan alamat dengan lengkap" class="form-control"><?php echo htmlspecialchars($ubahdata['alamat_pelanggan']); ?></textarea>
										</div> 
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">
											Telp/Hp
										</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="telepon" placeholder="Nomor Telp" value="<?php echo $ubahdata['telepon_pelanggan']; ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Ganti Foto</label>
										<div class="col-md-7">
											<input type="file" class="form-control" name="foto_pelanggan">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-7 col-md-offset-3">
											<button class="btn btn-warning" name="ubah">Ubah</button>
											<button class="btn btn-primary" type="reset">Batal</button>
											<a href="index.php" class="btn btn-info">Beranda</a>
										</div>
									</div>
								</form>
								<?php 

								if (isset($_POST['ubah'])) 
								{
									$namafoto=$_FILES['foto_pelanggan']['name'];
									$lokasifoto=$_FILES['foto_pelanggan']['tmp_name'];
									$namafotofiks = date("YmdHis").$namafoto;
	 	//jika foto diubah
									if (!empty($lokasifoto)) 
									{
										move_uploaded_file($lokasifoto, "foto_pelanggan/$namafotofiks");

										$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]', email_pelanggan='$_POST[email]',password_pelanggan='$_POST[password]',alamat_pelanggan='$_POST[alamat]',telepon_pelanggan=$_POST[telepon],foto_pelanggan='$namafotofiks' WHERE id_pelanggan='$_GET[id]'");
									}
									else
									{
										$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]', email_pelanggan='$_POST[email]',password_pelanggan='$_POST[password]',alamat_pelanggan='$_POST[alamat]',telepon_pelanggan=$_POST[telepon] WHERE id_pelanggan='$_GET[id]'");
									}
									echo "<script>alert('Data anda berhasil diubah')</script>";
									echo "<script>location='profile.php';</script>";
								}

								?>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- MY-ACCOUNT-CART-AREA END -->

<!-- nav end -->

<?php 
include 'footer.php';
?>