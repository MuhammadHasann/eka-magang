<?php
session_start();
if (!isset($_SESSION['id_login'])) {
    echo "<script>
    alert('Silakan Login Kembali !');
    window.location = '../index.php';
    </script>";
}else {
$page = "Master Data";
$list = "Dokumen";
include '../config/header.php';
if (isset($_GET['page']) && $_GET['page'] == 'tambah_data') {
    include 'dokumen/tambah_data.php';
}elseif(isset($_GET['page']) && $_GET['page'] == 'edit_data') {
    include 'dokumen/edit_data.php';
}elseif(isset($_GET['page']) && $_GET['page'] == 'hapus_data')  {
    include 'dokumen/hapus_data.php';
}else{
    include 'dokumen/data.php';
}
include '../config/footer.php';
}
?>
