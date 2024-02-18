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
				<a class="navbar-brand" href="#" style="color: #ff8680"><b><?= $title ?></b></a>
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


	<!-- nav end -->

	<!-- IMAGE -->
	<div class="container-fluid" style="margin: 0;padding: 0;">
		<div class="image" style="margin-top: -19px">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>		
				</ol>
				
				<!-- deklarasi carousel -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="image/home/4.jpg" style="width: 100%;  height: 550px;">
					</div>
					<div class="item">
						<img src="image/home/2.jpg" style="width: 100%;  height: 550px;">
					</div>
					<div class="item">
						<img src="image/home/3.jpg" style="width: 100%;  height: 550px;">
					</div>				
				</div>
				
				<!-- membuat panah next dan previous -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				</a>
			</div>
		</div>
	</div>
	<br>
	<br>

	<!-- PRODUK TERBARU -->
	<div class="container">


		<h4 class="text-center" style="font-family: arial; padding-top: 10px; padding-bottom: 10px; font-style: italic; line-height: 29px; border-top: 2px solid #9387ff; border-bottom: 2px solid #9387ff;">CCE Store merupakan sebuah toko yang melayani penjualan pembersih ruangan serta untuk pelayanan cleaning servis</h4>


		<h2 style=" width: 100%; border-bottom: 4px solid #9387ff; margin-top: 80px;"><b>Produk Kami</b></h2>

		<div class="row">
			
			<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
			<?php while($perproduk = $ambil->fetch_assoc()){ ?>
				
				<div class="col-sm-6 col-md-4" style=" width: 40vh;">
					<div class="thumbnail">
						<img src="image/produk/<?php echo $perproduk['foto_produk']; ?>" >
						<div class="caption">
							<h3><?php echo $perproduk['nama_produk']; ?></h3>
							
							<h5><?php echo 'Rp. ' . number_format($perproduk['harga_produk'],0,',', '.') . ',-'; ?></h5>
							<div class="row">
								<div class="col-md-6">
									<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary btn-block">Beli</a>
									<a href="detail_barang.php?id=<?php echo $perproduk['id_produk']?>" class="btn btn-default btn-block">Detail</a>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<?php 
			}
			?>

		</div>

		<br>
		<br>
		<br>
		<br>
		<?php 
		include 'footer.php';
	?>