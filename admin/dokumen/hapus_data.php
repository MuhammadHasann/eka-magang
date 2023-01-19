<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM dokumen WHERE id_dokumen = $id");
if ($query) {
    ?>
<script>
    window.location = 'dokumen.php?msg=success';
    </script>
    <?php
}else {
    echo mysqli_errno($koneksi);
}
?>