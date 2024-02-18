<?php 
session_start();

include 'koneksi/koneksi.php';

//jika tidak ada session pelanggan (blm login)

if(!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php'</script>";
	exit();
}


	//mendapatkan id_pembayaran dari url

$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

	//1. mendapatkan id_pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];

	//2. mendapatkan id_pelanggan yang login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if($id_pelanggan_login !== $id_pelanggan_beli)
{
	echo "<script>alert('Anda tidak bisa melihat Input Pembayaran orang lain!!!');</script>";
	echo "<script>location='riwayat.php'</script>";
	exit();

}

?><!DOCTYPE html>
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
									<form action="" method="post" enctype="multipart/form-data">
										<div class="shop-cart-table check-out-wrap">
											<div class="row">
													<div class="alert alert-info">Total Tagihan Anda <strong><?php echo 'Rp. '.number_format($detpem["total_pembelian"],0,',','.').',-'; ?></strong></div>
												<div class="col-md-6 col-sm-6 col-xs-12 mt-xs-30">
													<div class="billing-details pl-20">
														<h4 class="title-1 title-border text-uppercase mb-30">pembayaran</h4>
														<label for="">Nama Penyetor</label>
														<input type="text" class="form-control" name="nama">
														<label for="">Bank</label>
														<input type="text" class="form-control mb-15" name="bank">
														<label>Jumlah</label>
														<input type="text" class="form-control mb-15" name="jumlah" min="1" value="<?= $detpem['total_pembelian'] ?>" readonly>
														<label for="">Input Bukti Pembayaran</label>
														<input type="file" class="form-control mb-15" name="bukti" required="">
														<br>
														<button data-text="Upload Bukti" style="float: right; cursor: pointer; border: none;" name="kirim" class="btn btn-success">Upload Bukti</button>
														<br>
													</div>
												</div>
												
											</div>
										</div>
									</form>											
								</div>
								<!-- check-out end -->
<?php
        // Jika tombol kirim di pencet
        if(isset($_POST['kirim'])){
          // Upload dulu foto bukti
          $namabukti = $_FILES['bukti']['name'];
          $lokasibukti = $_FILES['bukti']['tmp_name'];
          $namafoto = date('YmdHis').$namabukti;
          move_uploaded_file($lokasibukti, "bukti/$namafoto");


          $nama = $_POST['nama'];
          $bank = $_POST['bank'];
          $jumlah = $_POST['jumlah'];
          $tanggal = date('Y-m-d');

          // Insert ke tabel pembayaran
          $koneksi->query("INSERT INTO pembayaran(id_pembelian, nama, bank, jumlah, tanggal, bukti) VALUES('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafoto')");

          // Update data pembelian dari pending menjadi sudah kirim pembayaran
          $koneksi->query("UPDATE pembelian SET status_pembelian='Sedang Di Proses' WHERE id_pembelian='$idpem'");

          echo "<script>alert('Terima kasih sudah melakukan pembayaran');</script>";
	        echo "<script>location='riwayat.php';</script>";
        }
        ?>
        <br>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

 <?php 
	include 'footer.php';
 ?>