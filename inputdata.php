<?php

require 'fungsi.php';

if (isset($_POST['kirim'])) {
    if (tambahdata($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Ditambahkan!');
                window.location.href='mahasiswa.php';
             </script>";
    } else {
        echo "<script>
                alert('Data Gagal Ditambahkan!');
                window.location.href='mahasiswa.php';
             </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>INFORMATIKA 2026</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td><a href="index.php">Home</a></td>
            <td><a href="profile.php">Profile</a></td>
            <td><a href="kontak.php">Kontak</a></td>
            <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
        </tr>
    </table>
    <br>
    <hr/>

    <h2>Tambah Data Mahasiswa</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <table cellpadding="5px">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" id="nama" name="asma" required /></td>
            </tr>
            <tr>
                <td><label for="nim">NIM</label></td>
                <td>:</td>
                <td><input type="number" id="nim" name="nim" required /></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan</label></td>
                <td>:</td>
                <td><input type="text" id="jurusan" name="prodi" required /></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td>:</td>
                <td><input type="text" id="email" name="email" /></td>
            </tr>
            <tr>
                <td><label for="nohp">No. Hp</label></td>
                <td>:</td>
                <td><input type="number" id="nohp" name="no_hp" /></td>
            </tr>
            <tr>
                <td><label for="foto">Foto</label></td>
                <td>:</td>
                <td><input type="text" id="foto" name="foto" /></td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit" name="kirim">Tambah</button>
                </td>
            </tr>
        </table>
    </form>

    <br>
    <hr>
</body>
</html>