<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">

      
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header border-0">
              <h2 class="mb-0 text-center text-uppercase">Tambah Pelanggan</h2>
            </div>
            <div class="card-body">
              
<form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" name="nama">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label>password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="form-group">
    <label>Telp Pelanggan</label>
    <input type="text" class="form-control" name="telepon">
  </div>
  <br>
  <button class="btn btn-primary" name="save">simpan</button>
  <a href="index.php?halaman=pelanggan" class="btn btn-warning">kembali</a>
</form>
<?php 
if (isset($_POST['save'])) 
{
  $koneksi->query("INSERT INTO pelanggan (nama_pelanggan,email_pelanggan,telepon_pelanggan,password_pelanggan) VALUES('$_POST[nama]','$_POST[email]','$_POST[telepon]','$_POST[password]')");

  echo "<div class='alert alert-info'>Data Tersimpan</div>";
  echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}



 ?>


                </div>
              </div>
            </div>
          </div>
        </div>


      </div>


    </div> <!-- container-fluid -->
  </div>

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