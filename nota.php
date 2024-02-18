
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
					<span> <i class="glyphicon glyphicon-earphone"></i> +6289523664013</span>
				</div>


				<div class="col-md-4"  style="padding: 3px;">
					<span><i class="glyphicon glyphicon-envelope"></i>radityadwip95@gmail.com</span>
				</div>


				<div class="col-md-4"  style="padding: 3px;">
					<span>CCE Store</span>
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
				<a class="navbar-brand" href="#" style="color: #ff8680"><b>CCE STORE</b></a>
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

	<section class="konten">
		<div class="container">
			
			<!-- nota disini copas dari nota(detail) yang ada diadmin -->
			<h2 class="text-center">Nota Pembelian</h2>
			<?php  
			$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
				ON pembelian.id_pelanggan = pelanggan.id_pelanggan
				WHERE pembelian.id_pembelian = '$_GET[id]'");
			$detail = $ambil->fetch_assoc(); 
			?>
<!-- 	<h1>data orang yang beli</h1>
	<pre><?php //print_r($detail); ?></pre>

	<h1>Data orang yang login di session</h1>
	<pre><?php //print_r($_SESSION); ?></pre> -->

	<?php 

	$idpelangganyangbeli = $detail["id_pelanggan"];

	$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

	if ($idpelangganyangbeli !== $idpelangganyanglogin) 
	{
		echo "<script>alert('Anda tidak bisa melihat nota orang lain!!!');</script>";
		echo "<script>location='riwayat.php';</script>";
		exit();

	}

	?>

	<div class="row">
		<div class="col-md-4">
			<h3>Pembelian</h3>
			<strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
			<p>
				Tanggal	 : <?php echo $detail['tanggal_pembelian']; ?><br>
				Total : <?php echo 'Rp. '. number_format($detail['total_pembelian'],0,',','.').',-'; ?><br>
			</p>
		</div>

		<div class="col-md-4">
			<h3>Pelanggan</h3>
			<strong>Nama : <?php echo $detail['nama_pelanggan']; ?></strong><br>
			<p>
				Telepon	 : <?php echo $detail['telepon_pelanggan']; ?><br>
				Email : <?php echo $detail['email_pelanggan']; ?>
			</p>
		</div>

		<div class="col-md-4">
			<h3>Pengiriman</h3>
			<strong>Kab. / Kota : <?php echo $detail['nama_kota'] ?></strong><br>
			Ongkos Kirim : <?php echo 'Rp. '.number_format($detail['tarif'],0,',','.').',-'; ?>
		</div>
	</div>


	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Harga</th>
				<th>Berat</th>
				<th>Jumlah</th>
				<th>Subberat</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor = 1 ?>
			<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'"); ?>
			<?php while($pecah = $ambil->fetch_assoc()) { ?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah['nama']; ?></td>
					<td><?php echo 'Rp. '.number_format( $pecah['harga'],0,',','.').',-'; ?></td>
					<td><?php echo $pecah['berat']; ?> gr.</td>
					<td><?php echo $pecah['jumlah']; ?></td>
					<td><?php echo $pecah['subberat']; ?> gr. </td>
					<td><?php echo 'Rp. '.number_format($pecah['subharga'],0,',','.').',-'; ?></td>
				</tr>
				<?php $nomor++; ?>
			<?php } ?>
		</tbody>
	</table>

	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info">
				<p>
					Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br> <strong>BANK BRI 0998-0977-9766-979-9 a/n Raditya Dwi Prastyo </strong>
				</p>
			</div>
			<p>
				<button type="button" class="btn btn-danger"  onclick="window.print();">Print</button>
			</p>
		</div>
	</div>

</div>
</section>


<?php include 'footer.php'?>