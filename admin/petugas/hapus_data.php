<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas = $id");
if ($query) {
    ?>
<script>
    window.location = 'petugas.php?msg=success';
    </script>
    <?php
}else {
    echo mysqli_errno($koneksi);
}
?>