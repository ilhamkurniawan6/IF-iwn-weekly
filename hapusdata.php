<?php
require 'fungsi.php';
require_login();

$id = $_GET['id'];
if (hapusdata($id) > 0) {
    echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'mahasiswa.php';
        </script>";
} else {
    echo "<script>
            alert('Data gagal dihapus. Coba lagi.');
            document.location.href = 'mahasiswa.php';
        </script>";
}
?>
