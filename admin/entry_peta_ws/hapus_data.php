<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM entry_peta_ws WHERE id_entry_peta_ws = $id");
if ($query) {
    ?>
<script>
    window.location = 'data_entry_peta_ws.php?msg=success';
    </script>
    <?php
}else {
    echo mysqli_errno($koneksi);
}
?>