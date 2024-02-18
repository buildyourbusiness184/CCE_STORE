<?php 
session_start();

//mendapatkan id_produk dari url
$id_produk = $_GET['id'];


if(isset($_SESSION['keranjang'][$id_produk]))
{
	$_SESSION['keranjang'][$id_produk] += 1;
}
else
{
	$_SESSION['keranjang'][$id_produk] = 1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// larikan ke halaman kerajang
echo "<script>alert('produk telah masuk ke keranjang');</script>";
echo "<script>location='keranjang.php';</script>";

?>