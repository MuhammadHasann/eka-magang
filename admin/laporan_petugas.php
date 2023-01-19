<?php
session_start();
if (!isset($_SESSION['id_login'])) {
    echo "<script>
    alert('Silakan Login Kembali !');
    window.location = '../index.php';
    </script>";
}else {
$page = 'Laporan';
$list = 'Data Sudah Entry';
include '../config/header.php';
if (isset($_GET['msg']) && $_GET['msg'] == "success") {
  ?>
   <script>
   Toast.fire({
     icon: 'success',
     title: 'Berhasil'
   });
      </script>
  <?php
}
?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?= $page.' '.$list ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <div class="col-md-4">
                <form method="POST" action="">
                    <div class="form-group row">
                    <div class="col-md-6">
                    <label>Bulan</label>
                          <select name="bulan" class="js-example-basic-single form-control" required>
                            <option value="">---</option>
                            <?php error_reporting(0) ?>
                            <option <?php echo select($_POST['bulan'], '01'); ?> value="01">Januari</option>
                            <option <?php echo select($_POST['bulan'], '02'); ?> value="02">Februari</option>
                            <option <?php echo select($_POST['bulan'], '03'); ?> value="03">Maret</option>
                            <option <?php echo select($_POST['bulan'], '04'); ?> value="04">April</option>
                            <option <?php echo select($_POST['bulan'], '05'); ?> value="05">Mei</option>
                            <option <?php echo select($_POST['bulan'], '06'); ?> value="06">Juni</option>
                            <option <?php echo select($_POST['bulan'], '07'); ?> value="07">Juli</option>
                            <option <?php echo select($_POST['bulan'], '08'); ?> value="08">Agustus</option>
                            <option <?php echo select($_POST['bulan'], '09'); ?> value="09">September</option>
                            <option <?php echo select($_POST['bulan'], '10'); ?> value="10">Oktober</option>
                            <option <?php echo select($_POST['bulan'], '11'); ?> value="11">November</option>
                            <option <?php echo select($_POST['bulan'], '12'); ?> value="12">Desember</option>
                          </select>
						</div>
                        <div class="col-md-6">
                        <label>Tahun</label>
						<select name="tahun" class="form-control">
                                <option value="">- Pilih -</option>
								<?php
                                    $y = date('Y');
                                    for($i=2017;$i<=$y+1;$i++){
                                        ?>
                                    <option value='<?= $i ?>' <?php isset($_POST['tahun']) && $_POST['tahun'] == $i ? print("selected") : "" ?>><?= $i ?></option>
                                    <?php
                                    }
                                    ?>
							</select>
						</div>
						  </div>

<button type="submit" class="btn btn-primary" name="print">Submit</button>

</form>
</div>
<hr/>
<?php if (isset($_POST['print'])) {
      $tahun = $_POST['tahun'];
      $bulan = $_POST['bulan'];
      ?>
          <a href="../print/print_data_sudah_entry.php?tahun=<?= $tahun ?>&&bulan=<?= $bulan ?>" target="_blank" class="btn btn-app">
                  <i class="fas fa-print"></i> Print
                </a>
                <?php } ?>
                <?php   $query = mysqli_query($koneksi, "SELECT * FROM data_entry
                INNER JOIN data_sudah_entry ON data_entry.id_data_entry = data_sudah_entry.id_data_entry");
                if (isset($_POST['print'])) {
                
                  $query = mysqli_query($koneksi, "SELECT * FROM data_entry
                  INNER JOIN data_sudah_entry ON data_entry.id_data_entry = data_sudah_entry.id_data_entry
                  WHERE YEAR(data_sudah_entry.tgl_entry) = '$tahun' AND MONTH(data_sudah_entry.tgl_entry) = '$bulan'");
                }?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
              <th>No.</th>
                <th>Tgl Entry</th>
                <th>Nama Peng Entry</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Nama SLS</th>
                <th>Jum. Kel. Verif</th>
                <th>Status SLS</th>
                <th>Tahun</th>
                
              </tr>
              </thead>
              <tbody>
                <?php
                
                $no = 1;
while ($data = mysqli_fetch_array($query)) {
  
                ?>
              <tr>
              <td><?= $no++ ?></td>
                <td><?= $data['tgl_entry'] ?></td>
                <td><?= $data['nama_entry'] ?></td>
                <td><?= $data['kabupaten'] ?></td>
                <td><?= $data['kecamatan'] ?></td>
                <td><?= $data['desa'] ?></td>
                <td><?= $data['nama_sls'] ?></td>
                <td><?= $data['jumlah_kel_verif'] ?></td>
                <td><?= $data['status_sls'] ?></td>
                <td><?= $data['tahun'] ?></td>
               
              </tr>
              <?php
}
?>
            
              </tbody>
              
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php include '../config/footer.php';
}
?>