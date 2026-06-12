<?php
require 'fungsi.php';

$message = '';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $foto = $_POST['foto'];

   // $cekNim = mysqli_query($connection, "SELECT nim FROM mahasiswa WHERE nim = '$nim' LIMIT 1");

    //if (mysqli_num_rows($cekNim) > 0) {
      //  $message = 'NIM sudah terdaftar. Pakai NIM yang berbeda.';
    //} else {
        $query = "INSERT INTO mahasiswa
        (nama, nim, jurusan, email, no_hp, foto)
        VALUES
        ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$foto')";

        mysqli_query($connection, $query);

        if (mysqli_affected_rows($connection) > 0) {
           echo "<script>
                alert('Data berhasil disimpan!');
                document.location.href = 'mahasiswa.php';
            </script>";
        }

        echo "<script>
                alert('Data gagal disimpan. Coba lagi.');
                document.location.href = 'mahasiswa.php';
            </script>";
  //  }
}
?>
  
<!DOCTYPE html>
<html lang="en">
                <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>INFORMATIKA 2026</title>
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

            <?php if ($message !== ''): ?>
                <p style="color: #ffb4b4; font-weight: 700;"><?= $message ?></p>
            <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">

            <label>Nama</label>
            <input type="text" name="nama" required>

            <label>NIM</label>
            <input type="text" name="nim" required>

            <label>Jurusan</label>
            <input type="text" name="jurusan" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>No. HP</label>
            <input type="number" name="no_hp" min="0" required>

            <label>foto</label>
            <input type="text" name="foto" accept="image/*" required>

            <button type="submit" name="submit">Tambah Data</button>

        </form>
            <hr/>
            <a href="profile.php">Lihat Profil</a>
            <a href="kontak.php">kontak</a>

            <a href="https://tiktok.com" target="_blank">TikTok</a>
        </body>
    </html>