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
				<a class="navbar-brand" href="#" style="color: #ff8680"><b><?= $title ?></b></a>
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


	<!-- PRODUK TERBARU -->
	<div class="container">
		<h2 style=" width: 100%; border-bottom: 4px solid #ff8680"><b>Produk Kami</b></h2>

		<div class="row">
			

			
			<div class="col-md-5">
				<form method="get">
					<input type="text" name="cari" class="form-control" placeholder="Cari produk disini ..." style=" background: white;">
					<button class="btn btn-info">Cari</button>
				</form>
			</div>
		</div><br><br>
		<?php
		if (isset($_GET['cari'])) {
			$cari = $_GET['cari'];
			$data = mysqli_query($koneksi, "SELECT * FROM produk WHERE warna LIKE '%" . $cari . "%'");
		} else {
			$data = mysqli_query($koneksi, "SELECT * FROM produk");
		}
		$cek = mysqli_num_rows($data);
		if ($cek > 0) {
			while ($produk = mysqli_fetch_array($data)) {
				?>

				<div class="col-sm-8 col-md-10" style=" width: 40vh;">
					<div class="thumbnail">
						<img src="image/produk/<?php echo $produk['foto_produk']; ?>">
						<div class="caption">
							<h3><?php echo $produk['nama_produk']; ?></h3>
							<p> Warna: <?php echo $produk['warna']; ?></p>
							
							<h5><?php echo 'Rp. ' . number_format($produk['harga_produk'],0,',', '.') . ',-'; ?></h5>
							<div class="row">
								<div class="col-md-6">
									<a href="beli.php?id=<?php echo $produk['id_produk']; ?>" class="btn btn-primary btn-block">Beli</a>
									<a href="detail_barang.php?id=<?php echo $produk['id_produk']?>" class="btn btn-default btn-block">Detail</a>
								</div>

								

							</div>
						</div>

					</div>
					
				</div>
			<?php } ?>
		<?php } else { ?>
			<div class="col-md-12">
				<h4 class="text-center">"Produk Tidak Ditemukan"</h4>
			</div>
		<?php } ?>
	</div>

</div>


<?php 
include 'footer.php';
?>