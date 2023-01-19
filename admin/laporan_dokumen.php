<?php
session_start();
if (!isset($_SESSION['id_login'])) {
    echo "<script>
    alert('Silakan Login Kembali !');
    window.location = '../index.php';
    </script>";
}else {
$page = 'Laporan';
$list = 'Dokumen';
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
      ?>
          <a href="../print/print_data_entry.php?tahun=<?= $tahun ?>" target="_blank" class="btn btn-app">
                  <i class="fas fa-print"></i> Print
                </a>
                <?php } ?>
                <?php  $query = mysqli_query($koneksi, "SELECT * FROM dokumen");
                if (isset($_POST['print'])) {
                
                  $query = mysqli_query($koneksi, "SELECT * FROM dokumen WHERE tahun = '$tahun'");
                }?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No.</th>
                <th>Tanggal Masuk</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Nama SLS</th>
                <th>Jumlah Keluarga</th>
                <th>Jumlah Dokumen K</th>
                <th>Jumlah Peta WS</th>
                <th>Opsi</th>
                
              </tr>
              </thead>
              <tbody>
                <?php
                
                $no = 1;
while ($data = mysqli_fetch_array($query)) {
  
                ?>
              <tr>
              <td><?= $no++ ?></td>
                <td><?= $data['tanggal_masuk'] ?></td>
                <td><?= $data['kabupaten'] ?></td>
                <td><?= $data['kecamatan'] ?></td>
                <td><?= $data['desa'] ?></td>
                <td><?= $data['nama_sls'] ?></td>
                <td><?= $data['jumlah_keluarga'] ?></td>
                <td><?= $data['jumlah_dokumen_k'] ?></td>
                <td><?= $data['jumlah_peta_ws'] ?></td>
               
              </tr>
              <?php
}
?>
            
              </tbody>
              <tfoot>
            
              </tfoot>
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