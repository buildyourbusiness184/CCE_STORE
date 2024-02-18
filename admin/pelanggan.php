 <div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

         
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h2 class="mb-0 text-center text-uppercase">Data Pelanggan</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Telepon Pelanggan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>
                                        <?php $ambil = $koneksi->query("SELECT * FROM pelanggan"); ?>
                                        <?php while($pecah = $ambil->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $nomor; ?></td>
                                                <td><?php echo $pecah['nama_pelanggan'];  ?></td>
                                                <td><?php echo $pecah['telepon_pelanggan']; ?></td>
                                                <td>
                                                    <a href="index.php?halaman=hapus_pelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php $nomor++; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            <a href="index.php?halaman=tambah_pelanggan" class="btn btn-primary">[+] Tambah Pelanggan</a>

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