<?php  
session_start();


include 'koneksi/koneksi.php';

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('keranjang kosong, silahkan berbelanja dahulu');</script>";
	echo "<script>location='index.php';</script>";
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
					<span><i class="glyphicon glyphicon-envelope"></i> <?= $email ?></span>
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
				<a class="navbar-brand" href="#" style="color: #ff8680"><b><?= $title ?> STORE</b></a>
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


	<div class="container" style="padding-bottom: 300px;">
		<h2 style=" width: 100%; border-bottom: 4px solid #9387ff"><b>Keranjang</b></h2>
		<table class="table table-striped">

			<thead>
				<tr>
					<th scope="col">No</th>
			
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>SubTotal</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
				<!-- menampilkan produk tg sedang diperulangkan berdasarkan id_produk -->
				<?php  
				$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah["harga_produk"] * $jumlah;

				// echo "<pre>";
				// print_r($pecah);
				// echo "</pre>";
				?>

				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama_produk"]; ?></td>
					<td><?php echo 'Rp. '. number_format($pecah["harga_produk"],0,',','.').',-'; ?></td>
					<td><?php echo $jumlah ?></td>
					<td><?php echo 'Rp. '.number_format("$subharga",0,',', '.'). ',-'; ?></td>
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">Hapus</a>
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php endforeach ?>

		</tbody>

	</table>
			<a href="produk.php" class="btn btn-default">Lanjutkan Belanja</a>
		<a href="checkout.php" class="btn btn-primary">Checkout</a>
</div>


<?php 
include 'footer.php';
?>