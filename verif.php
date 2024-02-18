<?php 	

include	"koneksi/koneksi.php";

$code = $_GET['code'];

if (isset($code)) {


	$qrycode = $koneksi->query("SELECT * FROM pelanggan where code='$code'");
	$hasilkode = $qrycode->fetch_assoc();



	$koneksi->query("UPDATE pelanggan SET status=1 WHERE code='$code'");
	echo "<script>alert('verif berhasil');</script>";
				echo "<script>location='index.php';</script>";
}




?>