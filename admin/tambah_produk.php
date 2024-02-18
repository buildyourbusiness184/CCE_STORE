<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header border-0">
              <h2 class="mb-0 text-center text-uppercase">Tambah Produk</h2>
            </div>
            <div class="card-body">

              <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                  <label>Harga (Rp)</label>
                  <input type="number" class="form-control" name="harga">
                </div>
                <div class="form-group">
                  <label>Berat (Gr)</label>
                  <input type="number" class="form-control" name="berat">
                </div>
                <div class="form-group">
                  <label>Stok Barang</label>
                  <input type="number" class="form-control" name="stok">
                </div>
                 <div class="form-group">
                  <label>Warna</label>
                  <input type="text" class="form-control" name="warna">
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control" name="deskripsi">
                  </textarea>
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control" name="foto">
                </div>
                <br>
                <button class="btn btn-primary" name="save">simpan</button>
              </form>
              <?php 
              if(isset($_POST['save']))
              {
                $nama = $_FILES['foto']['name'];
                $lokasi = $_FILES['foto']['tmp_name'];
                move_uploaded_file($lokasi, "../image/produk/'".$nama);

                $koneksi->query("INSERT INTO produk (nama_produk,harga_produk,berat_produk,stok_produk,foto_produk,deskripsi_produk,warna) VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$_POST[stok]','$nama','$_POST[deskripsi]','$_POST[warna]')");

                echo "<div class='alert alert-info'>Data Tersimpan</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
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