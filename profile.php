<?php 
session_start();

include 'koneksi/koneksi.php';
//jika tidak ada session pelanggan(belum login)
if(!isset($_SESSION["pelanggan"]))
{
  echo "<script>alert('silahkan login');</script>";
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


	<div class="my-account-area  pt-80 pb-80">
			<div class="container">	
				<div class="my-account">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="panel-group" id="accordion">
								<div class="panel">
									<div class="my-account-menu" >
										<a  data-toggle="collapse" data-parent="#accordion" href="#my-info" >
											Profil Saya
										</a>
									</div>
									<div id="my-info" class="panel-collapse collapse in">
										<div class="panel-body">


											<!-- <pre><?php print_r($_SESSION); ?></pre> -->
											<div class="billing-details shop-cart-table">
												<center>
													<?php 


													$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
													$ambil =  $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
													$datapelanggan = $ambil->fetch_assoc();

													?>
													<img src="foto_pelanggan/<?php echo $datapelanggan['foto_pelanggan']; ?>" width="130" class="mb-10"><br>
												<br>
												</center>
												<form method="POST" class="form-horizontal">

													<div class="form-group">
														<label class="control-label col-md-3">Email</label>
														<div class="col-md-7">
															<input type="text" class="form-control" name="email" value="<?php echo $datapelanggan['email_pelanggan'] ; ?>" readonly>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-3">Password</label>
														<div class="col-md-7">
															<input type="password" class="form-control" name="password" value="<?php echo $datapelanggan['password_pelanggan'] ; ?>" readonly>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-3">
															Telp/Hp
														</label>
														<div class="col-md-7">
															<input type="text" class="form-control" name="telepon" value="<?php echo $datapelanggan['telepon_pelanggan'] ; ?>" readonly>
														</div>
													</div>

													<div class="form-group">
														<div class="col-md-7 col-md-offset-3">
															<a href="ubah_profile.php?id=<?php echo $datapelanggan['id_pelanggan']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i>ubah</a>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
											
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>

<!-- nav end -->

<?php 
include 'footer.php';
?>