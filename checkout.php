
<?php 

session_start();
include 'koneksi/koneksi.php';

//jika tidak ada session pelanggan(belum login)
if(!isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='user_login.php';</script>";
}


if(!isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Silahkan berbelanja dahulu atau liat riwayat belanja');</script>";
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
					<span> <i class="glyphicon glyphicon-earphone"></i> +6287804616097</span>
				</div>


				<div class="col-md-4"  style="padding: 3px;">
					<span><i class="glyphicon glyphicon-envelope"></i> rapi-cakebakery@gmail.com</span>
				</div>


				<div class="col-md-4"  style="padding: 3px;">
					<span>rapi-cake bakery Indonesia</span>
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
			<h1>Keranjang Belanja</h1>
			<hr>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>SubTotal</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $totalbelanja = 0; ?>
					<?php foreach($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
						<!-- menampilkan produk tg sedang diperulangkan berdasarkan id_produk -->
						<?php  

						$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
						$pecah = $ambil->fetch_assoc();
						$subharga = $pecah["harga_produk"] * $jumlah;

						?>

						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah["nama_produk"]; ?></td>
							<td><?php echo 'Rp.'.number_format($pecah["harga_produk"],0,',', '.'). ',-'; ?></td>
							<td><?php echo $jumlah ?></td>
							<td><?php echo 'Rp.'.number_format("$subharga",0,',', '.'). ',-'; ?></td>
						</tr>
						<?php $nomor++; ?>
						<?php $totalbelanja += $subharga; ?>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4">Total Belanja</th>
						<th><?php echo 'Rp.'.number_format($totalbelanja,0,',', '.'). ',-'; ?> </th>
					</tr>
				</tfoot>
			</table>
			<form method="POST">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<select name="id_ongkir" class="form-control">
							<option value="">Pilih Ongkos Kirim</option>
							<?php
							$ambil = $koneksi->query("SELECT * FROM ongkir");
							while($perongkir = $ambil->fetch_assoc()) {
								?>
								<option value="<?php echo $perongkir['id_ongkir'] ?>">
									<?php echo $perongkir['nama_kota'] ?>
									- Rp.<?php echo number_format($perongkir['tarif']) ?>
								</option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="from-group">
					<label for="">Alamat Lengkap Pengiriman</label>
					<textarea class="form-control" placeholder="Masukkan alamat lengkap pengiriman" id="" cols="30" rows="3" name="alamat_pengiriman" required></textarea>
				</div><br>
				<button class="btn btn-primary" name="checkout">Checkout</button>
			</form>
			<br>
			

			<?php  
			if(isset($_POST["checkout"]))
			{
				$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
				$id_ongkir = $_POST["id_ongkir"];
				$tanggal_pembelian = date("Y-m-d");
				$alamat_pengiriman = $_POST['alamat_pengiriman'];



				$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
				$arrayongkir = $ambil->fetch_assoc();
				$nama_kota = $arrayongkir['nama_kota'];
				$tarif = $arrayongkir['tarif'];

				$total_pembelian = $totalbelanja+$tarif;

			//1. menyimpan data ke tabel pembelian
				$koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman') ");

			//mendapatkan id_pembelian barusan terjadi
				$id_pembelian_barusan = $koneksi->insert_id;

				foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
				{	
					$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
					$perproduk = $ambil->fetch_assoc();


					$nama = $perproduk['nama_produk'];
					$harga = $perproduk['harga_produk'];
					$berat = $perproduk['berat_produk'];

					$subberat = $perproduk['berat_produk']*$jumlah;
					$subharga = $perproduk['harga_produk']*$jumlah;
					$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah) VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat,','$subharga','$jumlah')");


					$koneksi->query("UPDATE produk SET stok_produk=stok_produk-$jumlah WHERE id_produk='$id_produk'");
				}
			//mengkosongkan keranjang belanja
				unset($_SESSION["keranjang"]);


			//tampilan dialihkan ke halaman nota, nota dari pembelian yang barusan
				echo "<script>alert('pembelian sukses');</script>";
				echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
			}
			?>
		</div>
	</section>

	<?php 
	include 'footer.php';
?>