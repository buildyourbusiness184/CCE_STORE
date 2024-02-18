
<?php 

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();


 ?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            

            <div class="row">
                <div class="col-lg-12">
                 <div class="card">
                    <div class="card-header border-0">
                      <h2 class="mb-0 text-center text-uppercase">Ubah Produk</h2>
                  </div>
                  <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
    </div>
    <div class="form-group">
        <label>Harga (Rp)</label>
        <input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk']; ?>">
    </div>
    <div class="form-group">
        <label>Berat Produk (Gr)</label>
        <input type="text" class="form-control" name="berat" value="<?php echo $pecah['berat_produk']; ?>">
    </div>
    <div class="form-group">
        <label>Stok Barang</label>
        <input type="number" class="form-control" name="stok" value="<?php echo $pecah['stok_produk']; ?>">
    </div>
    <div class="form-group">
        <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" alt="" width="200">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" id="" cols="20" rows="5" class="form-control"><?php echo $pecah['deskripsi_produk']; ?>
        </textarea>
    </div>
    <br>
    <button class="btn btn-primary" name="ubah">Ubah</button>
    <a href="index.php?halaman=produk" class="btn btn-warning" name="batal">Batal</a>
 </form>

 <?php 
if (isset($_POST['ubah'])) 
{
    $namafoto=$_FILES['foto']['name'];
    $lokasifoto=$_FILES['foto']['tmp_name'];
    //jika foto dirubah
    if (!empty($lokasifoto)) 
    {
        move_uploaded_file($lokasifoto, "../image/produk/$namafoto");

        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',stok_produk='$_POST[stok]',foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
    }
    else
    {
        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',stok_produk='$_POST[stok]',deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
    }
    echo "<script>alert('Data produk berhasil diubah')</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}
  ?>
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