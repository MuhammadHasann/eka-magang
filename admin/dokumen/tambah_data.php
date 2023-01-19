<?php
if (isset($_POST['save'])) {

  foreach ($_POST as $key => $value) {
    ${$key} = $value;
  }
  $query = mysqli_query($koneksi, "UPDATE dokumen SET tanggal_masuk = '$tanggal_masuk',
    kabupaten = '$kabupaten', kecamatan = '$kecamatan',desa = '$desa',
    nama_sls = '$nama_sls', jumlah_keluarga = '$jumlah_keluarga', jumlah_dokumen_k = '$jumlah_dokumen_k', jumlah_peta_ws = '$jumlah_peta_ws' 
    WHERE id_dokumen = '$id'");
  if ($query) {
?>
    <script>
      window.location = "dokumen.php?msg=success";
    </script>
  <?php
  } else {
    $e = "Mysql Error " . mysqli_errno($koneksi);
  ?>
    <script>
      Toast.fire({
        icon: 'error',
        title: '<?= $e ?>'
      });
    </script>
    <?php
    ?>
<?php
  }
}
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tambah Data <?= $list ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>tanggal_masuk</label>
              <input type="date" name="tanggal_masuk" value="<?= $d['tanggal_masuk'] ?>" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Kabupaten</label>
              <select type="text" name="kabupaten" class="form-control">
                <option value=""> -- Kabupaten -- </option>
                <option value="Banjar">Banjar</option>
              </select>
            </div>
            <div class="form-group">
              <label>kecamatan</label>
              <select type="text" name="kecamatan" class="form-control">
                <option value=""> -- kecamatan -- </option>
                <option value="Aluh-aluh">Aluh-aluh</option>
                <option value="Aranio">Aranio</option>
                <option value="Astambul">Astambul</option>
                <option value="Beruntung Baru">Beruntung Baru</option>
                <option value="Gambut">Gambut</option>
                <option value="Karang Intan">Karang Intan</option>
                <option value="Kertak Hanyar">Kertak Hanyar</option>
                <option value="Martapura Barat">Martapura Barat</option>
                <option value="Martapura Kota">Martapura Kota</option>
                <option value="Martapura Timur">Martapura Timur</option>
                <option value="Mataraman">Mataraman</option>
                <option value="Pengaron">Pengaron</option>
                <option value="Peramasan">Peramasan</option>
                <option value="Sambung Makmur">Sambung Makmur</option>
                <option value="Sungai Pinang">Sungai Pinang</option>
                <option value="Sungai Tabuk">Sungai Tabuk</option>
                <option value="Simpang Empat">Simpang Empat</option>
                <option value="Tatah Makmur">Tatah Makmur</option>
                <option value="Telaga Bauntung">Telaga Bauntung</option>
                <option value="Cintapuri Darussalam">Cintapuri Darussalam</option>
              </select>
            </div>
            <div class="form-group">
              <label>Desa</label>
              <input type="text" name="desa" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Nama SLS</label>
              <input type="text" name="nama_sls" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Jumlah Keluarga</label>
              <input type="number" name="jumlah_keluarga" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Jumlah Dokumen K</label>
              <input type="number" name="jumlah_dokumen_k" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Jumlah_Peta_WS</label>
              <input type="number" name="jumlah_peta_ws" class="form-control" required>
            </div>
              </select>
            </div>
            <input type="submit" value="Submit" name="save" class="btn btn-primary float-right">
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

  </div>

</section>
<!-- /.content -->