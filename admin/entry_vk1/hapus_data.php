<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM entry_vk1 WHERE id_entry_vk1 = $id");
if ($query) {
    ?>
<script>
    window.location = 'entry_vk1.php?msg=success';
    </script>
    <?php
}else {
    echo mysqli_errno($koneksi);
}
?>