
<?php  
$semuadata=array();
$tgl_mulai = "-";
$tgl_selesai = "-";

if(isset($_POST["kirim"]))
{

    $tgl_mulai = $_POST["tglm"];
    $tgl_selesai = $_POST["tgls"];
    $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");

    while($pecah = $ambil->fetch_assoc())
    {
        $semuadata[]=$pecah;
    }

}
?>


 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                       
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
        <div class="card-header border-0">
        <h2 class="mb-0 text-center text-uppercase">Laporan Pembelian  dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></h2>
        </div>
        <div class="card-body">
        <div class="table-responsive">
<form method="post">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
            </div>
        </div>
        <div class="col-md-5">
                <label>Tanggal Selesai</label>
                <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
        </div>
        <div class="col-md-2">
            <label>&nbsp;</label><br>
            <button class="btn btn-primary" name="kirim">Lihat</button>
        </div>
    </div>
</form>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $total=0; ?>
        <?php  foreach($semuadata as $key => $value): ?>
        <?php $total+=$value['total_pembelian'] ?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value["nama_pelanggan"] ?></td>
            <td><?php echo $value["tanggal_pembelian"] ?></td>
            <td><?php echo 'Rp. '.number_format($value["total_pembelian"],0,',','.').',-'; ?></td>
            <td><?php echo $value["status_pembelian"] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total</th>
            <th><?php echo 'Rp. '.number_format($total,0,',','.').',-'; ?></th>
        </tr>
    </tfoot>
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