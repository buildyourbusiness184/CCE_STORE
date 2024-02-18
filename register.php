<?php 
session_start();
include 'koneksi/koneksi.php';


?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<script  src="js/jquery.js"></script>
	<script  src="js/bootstrap.min.js"></script>


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

	<nav class="navbar navbar-default" style="padding: 5px;">
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#" style="color: #ff8680"><b><?=$nama ?></b></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="produk.php">Produk</a></li>
					<li><a href="about.php">Tentang Kami</a></li>
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
								<li><a href="riwayat.php">Riwayat Pembelian</a></li>
								<li><a href="profile.php">Profile</a></li>
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

	<div class="container" style="padding-bottom: 250px;">
		<h2 style=" width: 100%; border-bottom: 4px solid #ff8680"><b>Register</b></h2>
		<div class="panel-body">

			<form method="POST" action="smtp.php" class="form-horizontal" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label col-md-3">Nama</label>
					<div class="col-md-7">
						<input type="text" class="form-control" name="nama" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3">Email</label>
					<div class="col-md-7">
						<input type="email" class="form-control" name="email" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3">Password</label>
					<div class="col-md-7">
						<input type="password" class="form-control" name="password" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3">
						Alamat
					</label>
					<div class="col-md-7">
						<textarea name="alamat" placeholder="Masukkan alamat dengan lengkap" class="form-control" required></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">
						Telp/Hp
					</label>
					<div class="col-md-7">
						<input type="telp" class="form-control" name="telepon" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Foto</label>
					<div class="col-md-7">
						<input type="file" class="form-control" name="foto" id="foto">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-7 col-md-offset-3">
						<button class="btn btn-primary" name="daftar" id="daftar">Daftar</button>
					</div>
				</div>

			</form>
		

		</div>
	</div>

	<?php 
	include 'footer.php';
?>