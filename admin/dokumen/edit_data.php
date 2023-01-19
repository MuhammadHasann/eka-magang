<?php
$id = $_GET['id'];
$select = mysqli_query($koneksi, "SELECT * FROM dokumen WHERE id_dokumen = '$id'");
$d = mysqli_fetch_array($select);

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
          <h3 class="card-title">Edit Data <?= $list ?></h3>

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
              <input type="text" name="tanggal_masuk" value="<?= $d['tanggal_masuk'] ?>" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Kabupaten</label>
              <select type="text" name="kabupaten" class="form-control">
                <option value=""> -- Kabupaten -- </option>
                <option <?php echo select($d['kabupaten'], "Banjar"); ?> value="Banjar">Banjar</option>
              </select>
            </div>
            <div class="form-group">
              <label>kecamatan</label>
              <select type="text" name="kecamatan" class="form-control">
                <option value=""> -- kecamatan -- </option>
                <option <?php echo select($d['kecamatan'], "Aluh-aluh"); ?> value="Aluh-aluh">Aluh-aluh</option>
                <option <?php echo select($d['kecamatan'], "Aranio"); ?> value="Aranio">Aranio</option>
                <option <?php echo select($d['kecamatan'], "Astambul"); ?> value="Astambul">Astambul</option>
                <option <?php echo select($d['kecamatan'], "Beruntung Baru"); ?> value="Beruntung Baru">Beruntung Baru</option>
                <option <?php echo select($d['kecamatan'], "Gambut"); ?> value="Gambut">Gambut</option>
                <option <?php echo select($d['kecamatan'], "Karang Intan"); ?> value="Karang Intan">Karang Intan</option>
                <option <?php echo select($d['kecamatan'], "Kertak Hanyar"); ?> value="Kertak Hanyar">Kertak Hanyar</option>
                <option <?php echo select($d['kecamatan'], "Martapura Barat"); ?> value="Martapura Barat">Martapura Barat</option>
                <option <?php echo select($d['kecamatan'], "Martapura Kota"); ?> value="Martapura Kota">Martapura Kota</option>
                <option <?php echo select($d['kecamatan'], "Martapura Timur"); ?> value="Martapura Timur">Martapura Timur</option>
                <option <?php echo select($d['kecamatan'], "Mataraman"); ?> value="Mataraman">Mataraman</option>
                <option <?php echo select($d['kecamatan'], "Pengaron"); ?> value="Pengaron">Pengaron</option>
                <option <?php echo select($d['kecamatan'], "Peramasan"); ?> value="Peramasan">Peramasan</option>
                <option <?php echo select($d['kecamatan'], "Sambung Makmur"); ?> value="Sambung Makmur">Sambung Makmur</option>
                <option <?php echo select($d['kecamatan'], "Sungai Pinang"); ?> value="Sungai Pinang">Sungai Pinang</option>
                <option <?php echo select($d['kecamatan'], "Sungai Tabuk"); ?> value="Sungai Tabuk">Sungai Tabuk</option>
                <option <?php echo select($d['kecamatan'], "Simpang Empat"); ?> value="Simpang Empat">Simpang Empat</option>
                <option <?php echo select($d['kecamatan'], "Tatah makmur"); ?> value="Tatah Makmur">Tatah Makmur</option>
                <option <?php echo select($d['kecamatan'], "Telaga Bauntung"); ?> value="Telaga Bauntung">Telaga Bauntung</option>
                <option <?php echo select($d['kecamatan'], "Cintapuri Darussalam"); ?> value="Cintapuri Darussalam">Cintapuri Darussalam</option>
              </select>
            </div>
            <div class="form-group">
              <label>Desa</label>
              <input type="text" name="desa" value="<?= $d['desa'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Nama SLS</label>
              <input type="text" name="nama_sls" value="<?= $d['nama_sls'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Jumlah Keluarga</label>
              <input type="number" name="jumlah_keluarga" value="<?= $d['jumlah_keluarga'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Jumlah Dokumen K</label>
              <input type="number" name="jumlah_dokumen_k" value="<?= $d['jumlah_dokumen_k'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Jumlah_Peta_WS</label>
              <input type="number" name="jumlah_peta_ws" value="<?= $d['jumlah_peta_ws'] ?>" class="form-control" required>
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