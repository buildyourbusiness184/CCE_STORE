 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                       
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
        <div class="card-header border-0">
        <h2 class="mb-0 text-center text-uppercase">Data Produk</h2>
        </div>
        <div class="card-body">
        <div class="table-responsive">
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Stok</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
        <?php while($pecah=$ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td align="left"><?php echo $pecah['nama_produk']; ?></td>
            <td><?php echo 'Rp. '.number_format($pecah['harga_produk'],0,',','.').',-'; ?></td>
            <td><?php echo $pecah['berat_produk'];?> (Gr)</td>
            <td><?php echo $pecah['stok_produk']; ?></td>
            <td>
                <img src="../image/produk/<?php echo $pecah['foto_produk']; ?>" width="100" alt="">
            </td>
            <td>
                <a href="index.php?halaman=hapus_produk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn"><i class="fa fa-remove"></i>hapus</a>
                <a href="index.php?halaman=ubah_produk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i>ubah</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
        </div>
       
<a href="index.php?halaman=tambah_produk" class="btn btn-primary">[+] Tambah Produk</a>

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