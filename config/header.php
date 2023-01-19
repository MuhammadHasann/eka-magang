<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BPS Kabupaten Banjar</title>

  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="../public/css/styles.css" rel="stylesheet" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
   <!-- dropzonejs -->
   <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- SweetAlert2 -->
  <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="../plugins/toastr/toastr.min.js"></script>

  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

  <script>
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  </script>

</head>
<?php 
function thousandSparator($number){
	$example = $number;
	$subtotal =  "Rp. ".number_format($number, 0, ',', '.');
	return $subtotal;
}
include '../config/koneksi.php';
include '../config/chart-connection.php';
$bulan = array(
  1 =>   'Januari',
  'Februari',
  'Maret',
  'April',
  'Mei',
  'Juni',
  'Juli',
  'Agustus',
  'September',
  'Oktober',
  'November',
  'Desember'
);

function tanggal_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split       = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

    return $tgl_indo;
}

function select($data, $value)
{

  if ($data == $value) {
    $hasil = "selected";
  }else {
    $hasil = "";
  }
  return $hasil;
}

?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <center>
    <a href="" class="brand-link"> 
    <img src="../dist/img/logo.png" alt="Logo" class="brand-image elevation-3 bg-blue">
  </br>
  <span class="brand-text font-weight-light">BPS Kabupaten Banjar</span>
</a>
</center>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="index.php" class="nav-link <?php isset($page) && $page == "Home" ? print("active") : "" ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
        
          <li class="nav-item <?php isset($page) && $page == "Master Data" ? print('menu-open') : "" ?>">
            <a href="#" class="nav-link <?php isset($page) && $page == "Master Data" ? print('active') : "" ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dokumen.php" class="nav-link <?php isset($list) && $list == "Dokumen" ? print('active') : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dokumen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="petugas.php" class="nav-link <?php isset($list) && $list == "Petugas" ? print('active') : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Petugas</p>
                </a>
              </li>
            </ul>

            <li class="nav-item <?php isset($page) && $page == "Proses Surat" ? print('menu-open') : "" ?>">
            <a href="#" class="nav-link <?php isset($page) && $page == "Proses Surat" ? print("active") : "" ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Process Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="entry_vk1.php" class="nav-link <?php isset($list) && $list == "Entry VK1" ? print('active') : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entry VK1</p>

                  <i class="fas fa-angle-left right"></i>
              </p>
                </a>
              </li>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="entry_k.php" class="nav-link <?php isset($list) && $list == "Entry K" ? print('active') : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entry K</p>

                  <i class="fas fa-angle-left right"></i>
              </p>
                </a>
              </li>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="entry_peta_ws.php" class="nav-link <?php isset($list) && $list == "Entry Peta WS" ? print('active') : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entry Peta WS</p>
                </a>
              </li>
             
            </ul>

            <li class="nav-item <?php isset($page) && $page == "Laporan" ? print('menu-open') : "" ?>">
            <a href="#" class="nav-link <?php isset($page) && $page == "Laporan" ? print("active") : "" ?>">
              <i class="nav-icon fas fa-print"></i>
              <p>
              Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dokumen.php" class="nav-link <?php isset($list) && $list == "Dokumen" ? print('active') : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dokumen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="laporan_data_sudah_entry.php" class="nav-link <?php isset($list) && $list == "Petugas" ? print('active') : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Petugas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="laporan_data_miskin.php" class="nav-link <?php isset($list) && $list == "Data VK1" ? print('active') : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entry VK1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="laporan_data_sangat_miskin.php" class="nav-link <?php isset($list) && $list == "Entry K" ? print('active') : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entry K</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="laporan_data_tidak_miskin.php" class="nav-link <?php isset($list) && $list == "Data tidak Miskin" ? print('active') : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entry Peta WS</p>
                </a>
              </li>
            </ul>
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="../config/logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $page ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?= $page ?></a></li>
              <li class="breadcrumb-item active"><?php isset($list) ? print($list) : "" ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
