<?php  
session_start();
include 'koneksi/koneksi.php';
$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran 
	LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian 
	WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detbay);
// echo "</pre>";


//Validasi jika belum ada data pembayaran
if(empty($detbay))
{
	echo "<script>alert('Belum Ada Data Pembayaran')</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

//Validasi jika data pelanggan yg bayar tidak sesuai dengan yg login
if($_SESSION["pelanggan"]["id_pelanggan"]!==$detbay["id_pelanggan"])
{
	echo "<script>alert('Anda Tidak berhak melihat Riwayat Orang Lain')</script>";
	echo "<script>location='index.php';</script>";
	exit();
}




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
	<div class="shopping-cart-area  pt-80 pb-80">
			<div class="container">	
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="shopping-cart">

							<!-- Tab panes -->
							<div class="tab-content">
								<!-- check-out start -->
								<div class="tab-pane active" id="check-out">
									<table class="table">
										<tr>
											<th>Nama</th>
											<th><?php echo $detbay["nama"] ?></th>
										</tr>
										<tr>
											<th>Bank</th>
											<th><?php echo $detbay["bank"] ?></th>
										</tr>
										<tr>
											<th>Tanggal</th>
											<th><?php echo $detbay["tanggal"] ?></th>
										</tr>
										<tr>
											<th>Jumlah</th>
											<th>Rp. <?php echo number_format($detbay["jumlah"],0,',','.').',-' ?></th>
										</tr>
										<tr>
											<th>Bukti</th>
											
										</tr>
										
									</table>									
								</div>
								<!-- check-out end -->

								<div class="col-md-6">
									<img src="bukti/<?php echo $detbay["bukti"] ?>" alt="" class="img-responsive" width='300px'>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
 <?php 
	include 'footer.php';
 ?>