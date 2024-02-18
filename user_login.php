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
							</ul>
						</li>
						<?php 
					}else{
						?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?= $_SESSION['nama_pelanggan']; ?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
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
		<h2 style=" width: 100%; border-bottom: 4px solid #ff8680"><b>Login</b></h2>

		<form action="" method="POST">
			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input type="text" class="form-control" name="email" placeholder="Masukkan Email" style="width: 500px;"/ >
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Password</label>
				<input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password" name="password" style="width: 500px;">
			</div>
			<button type="submit" class="btn btn-success" name="masuk">Login</button>
			<a href="register.php" class="btn btn-primary">Daftar</a>
		</form>
	</div>


	<?php  
//jika tombol "masuk" ditekan maka
	if (isset($_POST["masuk"])) 
	{

		$email = $_POST["email"];
		$password = $_POST["password"];


		$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

		$cocok = $ambil->num_rows;

		if (	$cocok > 0) {
			$verif = $ambil->fetch_assoc();
			if ($verif['status']==1) {
				$_SESSION["pelanggan"] = $verif;
				$_SESSION['nama_pelanggan'] = $verif['nama_pelanggan'];
				echo "<script>alert('anda sukses login');</script>";

			}else{
				echo "<script>alert('Harap Verif Akun Anda');</script>";

			}
			 //jika sudah belanja 
			if (isset($_SESSION["keranjang"])  OR !empty($_SESSION["keranjang"]))
			{
				echo "<script>location='checkout.php';</script>";
			}
			else
			{
				echo "<script>location='index.php';</script>";
			}
		}
		else
		{
			echo "<script>alert('Email dan Password tidak valid');</script>";
			echo "<script>location='user_login.php';</script>";

		}
	}



?>


<?php 
include 'footer.php';
?>