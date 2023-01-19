<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM entry_k WHERE id_entry_k = $id");
if ($query) {
    ?>
<script>
    window.location = 'entry_k.php?msg=success';
    </script>
    <?php
}else {
    echo mysqli_errno($koneksi);
}
?>