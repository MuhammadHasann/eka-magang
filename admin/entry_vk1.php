<?php
session_start();
if (!isset($_SESSION['id_login'])) {
    echo "<script>
    alert('Silakan Login Kembali !');
    window.location = '../index.php';
    </script>";
}else {
$page = "Proses Data";
$list = "Entry VK1";
include '../config/header.php';
if (isset($_GET['page']) && $_GET['page'] == 'tambah_data') {
    include 'entry_vk1/tambah_data.php';
}elseif(isset($_GET['page']) && $_GET['page'] == 'edit_data') {
    include 'entry_vk1/edit_data.php';
}elseif(isset($_GET['page']) && $_GET['page'] == 'hapus_data')  {
    include 'entry_vk1/hapus_data.php';
}else{
    include 'entry_vk1/data.php';
}
include '../config/footer.php';
}
?>
