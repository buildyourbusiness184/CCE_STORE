 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                       
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
        <div class="card-header border-0">
        <h2 class="mb-0 text-center text-uppercase">Detail Pembelian</h2>
        </div>
        <div class="card-body">
        <div class="table-responsive">
<?php  
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan = pelanggan.id_pelanggan
    WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc(); 
?>


<div class="row">
    <div class="col-md-4">
        <h3>Pembelian</h3>
        <strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
        Tanggal  : <?php echo $detail['tanggal_pembelian']; ?><br>
        Total : <?php echo 'Rp. '. number_format($detail['total_pembelian'],0,',','.').',-'; ?><br>
        Status : <?php echo $detail['status_pembelian']; ?>
    </div>

    <div class="col-md-4">
        <h3>Pelanggan</h3>
        <strong>Nama : <?php echo $detail['nama_pelanggan']; ?></strong><br>
        Telepon  : <?php echo $detail['telepon_pelanggan']; ?><br>
        Email : <?php echo $detail['email_pelanggan']; ?>
    </div>

    <div class="col-md-4">
        <h3>Pengiriman</h3>
        <strong>Kab. / Kota : <?php echo $detail['nama_kota'] ?></strong><br>
        Tarif : <?php echo 'Rp. '.number_format($detail['tarif'],0,',','.').',-'; ?><br>
        Alamat Pengiriman : <?php echo $detail['alamat_pengiriman']; ?>
    </div>
</div>
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1 ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk 
            ON pembelian_produk.id_produk = produk.id_produk 
            WHERE pembelian_produk.id_pembelian_produk = '$_GET[id]'"); ?>
            <?php while($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td>Rp. <?php echo number_format( $pecah['harga_produk'],0,',','.').',-'; ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga_produk'] * $pecah['jumlah'],0,',','.').',-'; ?></td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
        </div>
       
<br>
<a href="index.php" class="btn btn-info">Beranda</a>
        </div>
      </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © <?= $pembuat ?>.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="" target="_blank" class="text-reset"><?= $pembuat ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>