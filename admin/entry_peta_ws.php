<?php
session_start();
if (!isset($_SESSION['id_login'])) {
    echo "<script>
    alert('Silakan Login Kembali !');
    window.location = '../index.php';
    </script>";
}else {
$page = "Proses Data";
$list = "Entry Peta WS";
include '../config/header.php';
if (isset($_GET['page']) && $_GET['page'] == 'tambah_data') {
    include 'entry_peta_ws/tambah_data.php';
}elseif(isset($_GET['page']) && $_GET['page'] == 'edit_data') {
    include 'entry_peta_ws/edit_data.php';
}elseif(isset($_GET['page']) && $_GET['page'] == 'hapus_data')  {
    include 'entry_peta_ws/hapus_data.php';
}else{
    include 'entry_peta_ws/data.php';
}
include '../config/footer.php';
}
?>
