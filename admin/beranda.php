  <div class="main-content">

    <div class="page-content">
      <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
              <h4 class="mb-0">Dashboard</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                </ol>
              </div>

            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="index.php?halaman=produk"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                 Produk</div></a>
                                <div class="h4 mb-0 font-weight-bold text-gray-800">
                                    <?php $data = mysqli_query($koneksi,"SELECT * FROM produk"); ?>
                                       <a href="index.php?halaman=produk"> <?php echo mysqli_num_rows($data); ?></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tshirt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="index.php?halaman=pelanggan"><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pelanggan</div></a>
                                <div class="h4 mb-0 font-weight-bold text-gray-800">
                                    <?php $data = mysqli_query($koneksi,"SELECT * FROM pelanggan"); ?>
                                    <a href="index.php?halaman=pelanggan">  <?php echo mysqli_num_rows($data); ?></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                  <a href="index.php?halaman=pembelian"><div class="text-xs font-weight-bold text-info text-uppercase mb-1">Transaksi</div></a>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h4 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <?php $data = mysqli_query($koneksi,"SELECT * FROM pembayaran"); ?>
                                              <a href="index.php?halaman=pembelian"><?php echo mysqli_num_rows($data); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-wallet fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
           <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="index.php?halaman=laporan_pembelian"><div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Laporan Pembelian</div></a>
                                <div class="h4 mb-0 font-weight-bold text-gray-800">
                                    <?php $data = mysqli_query($koneksi,"SELECT * FROM pembelian"); ?>
                                    <a href="index.php?halaman=laporan_pembelian"><?php echo mysqli_num_rows($data); ?></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-star fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>


      </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <script>document.write(new Date().getFullYear())</script> © <?= $pembuat ?>
          </div>
          <div class="col-sm-6">
            <div class="text-sm-end d-none d-sm-block">
              Crafted with <i class="mdi mdi-heart text-danger"></i> by <a target="_blank" class="text-reset"><?= $pembuat ?></a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>