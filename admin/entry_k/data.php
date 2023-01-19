<?php
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
            <h3 class="card-title">Data <?= $list ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <a href="?page=tambah_data" class="btn btn-app">
                  <i class="fas fa-plus"></i> Tambah Data
                </a>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No.</th>
                <th>Tanggal_Entry</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Nama SLS</th>
                <th>No urut Keluarga Verif</th>
                <th>Opsi</th>
              </tr>
              </thead>
              <tbody>
              <?php
                $query = mysqli_query($koneksi, "SELECT * FROM entry_k
                INNER JOIN entry_k ON id_entry_k = petugas.id_petugas");
                $no = 1;
while ($data = mysqli_fetch_array($query)) {
  
                ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['kabupaten'] ?></td>
                <td><?= $data['kecamatan'] ?></td>
                <td><?= $data['desa'] ?></td>
                <td><?= $data['nama_sls'] ?></td>
                <td><?= $data['no_hasil_verifikasi'] ?></td>
                <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="?page=edit_data&&id=<?= $data['id_entry_k'] ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#" onClick="confirm_modal('?page=hapus_data&&id=<?= $data['id_entry_k'] ?>');">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
            </td>
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