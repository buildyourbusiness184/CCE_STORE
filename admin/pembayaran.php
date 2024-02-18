 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                       
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
        <div class="card-header border-0">
        <h2 class="mb-0 text-center text-uppercase">Data Pembelian</h2>
        </div>
        <div class="card-body">
        <div class="table-responsive">
<?php 

//mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];

//MENGAMBIL DATA PEMBAYARAN BERDASARKAN ID_PEMBELIAN

$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

?>

<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <th><?php echo $detail['nama']?></th>
            </tr>
            <tr>
                <th>Bank</th>
                <th><?php echo $detail['bank'] ?></th>
            </tr>
            <tr>
                <th>Jumlah</th>
                <th><?php echo $detail['jumlah']?></th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th><?php echo $detail['tanggal'] ?></th>
            </tr>
            <tr>
                <th>Foto Bukti Pembayaran</th>
                <th>
                    <img src="../bukti/<?php echo $detail["bukti"] ?>" alt="" class="img-responsive" width='300px'>
                </th>
            </tr>
        </table>
    </div>

</div>

<?php 



$ambil=$koneksi->query("SELECT * FROM produk");

$num=mysqli_num_rows($ambil);

$jmlh=$num+1;

$waktu=date('dmy');

$nounik="CCE".$waktu.$jmlh;


 ?>


<form method="post">
    <div class="form-group">
        <label>No Resi Pengiriman</label>
        <input type="text" class="form-control" name="resi" value="<?= $nounik ?>">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select name="status" id="" class="form-control">
            <option value="">Pilih Status</option>
            <option value="lunas">Lunas</option>
            <option value="barang dikirim">Dikirim</option>
            <option value="batal">Batal</option>
        </select>
    </div>
    <button class="btn btn-primary" name="proses">Proses</button>
</form>
<br>

<?php  
if (isset($_POST["proses"])) {

    $resi = $_POST["resi"];
    $status = $_POST["status"];
    $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

    echo "<script>alert('data pembelian sudah di UPDATE');</script>";
    echo "<script>location='index.php?halaman=pembelian';</script>";
}
?>
        </div>
       

        </div>
      </div>
      <a href="index.php" class="btn btn-info">Beranda</a>

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