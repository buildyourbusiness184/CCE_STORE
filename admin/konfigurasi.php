<?php 
if (@$_GET['halaman'] == 'beranda' || @$_GET['halaman' == '']) {
  include 'beranda.php';
}elseif (@$_GET['halaman'] == "beranda") {
  include 'beranda.php';
}elseif (@$_GET['halaman'] == "produk") {
  include 'produk.php';
}elseif (@$_GET['halaman'] == "pembelian") {
  include 'pembelian.php';
}elseif (@$_GET['halaman'] == "laporan_pembelian") {
  include 'laporan_pembelian.php';
}elseif (@$_GET['halaman'] == "tambah_produk") {
  include 'tambah_produk.php';
}elseif (@$_GET['halaman'] == "pelanggan") {
  include 'pelanggan.php';
}elseif (@$_GET['halaman'] == "tambah_pelanggan") {
  include 'tambah_pelanggan.php';
}elseif (@$_GET['halaman'] == "hapus_pelanggan") {
  include 'hapus_pelanggan.php';
}elseif (@$_GET['halaman'] == "hapus_produk") {
  include 'hapus_produk.php';
}elseif (@$_GET['halaman'] == "ubah_produk") {
  include 'ubah_produk.php';
}elseif (@$_GET['halaman'] == "logout") {
  include 'logout.php';
}elseif (@$_GET['halaman'] == "detail") {
  include 'detail.php';
}elseif (@$_GET['halaman'] == "pembayaran") {
  include 'pembayaran.php';
}else{
  include 'beranda.php';
}
?>