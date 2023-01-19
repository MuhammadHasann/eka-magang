<?php
session_start();
if (!isset($_SESSION['id_login'])) {
    echo "<script>
    alert('Silakan Login Kembali !');
    window.location = '../index.php';
    </script>";
}else {
$page = 'Laporan';
$list = 'Data Sangat Miskin';
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
          <a href="../print/print_data_sangat_miskin.php?tahun=<?= $tahun ?>" target="_blank" class="btn btn-app">
                  <i class="fas fa-print"></i> Print
                </a>
                <?php } ?>
                <?php  $query = mysqli_query($koneksi, "SELECT * FROM data_entry 
                INNER JOIN data_miskin ON data_entry.id_data_entry = data_miskin.id_data_entry WHERE data_miskin.kategori_miskin = 'Sangat Miskin'");
                if (isset($_POST['print'])) {
                
                  $query = mysqli_query($koneksi, "SELECT * FROM data_entry 
                  INNER JOIN data_miskin ON data_entry.id_data_entry = data_miskin.id_data_entry WHERE data_miskin.kategori_miskin = 'Sangat Miskin' AND data_entry.tahun = '$tahun'");
                }?>
             <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No.</th>
                <th>Jumlah Keluarga</th>
                <th>Kesejahteraan</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Penghasilan</th>
                <th>Kategori Miskin</th>
                
              </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
while ($data = mysqli_fetch_array($query)) {
  
                ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['jumlah_keluarga'] ?></td>
                <td><?= $data['kesejahteraan'] ?></td>
                <td><?= $data['kabupaten'] ?></td>
                <td><?= $data['kecamatan'] ?></td>
                <td><?= $data['desa'] ?></td>
                <td><?= $data['penghasilan'] ?></td>
                <td><?= $data['kategori_miskin'] ?></td>
                
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