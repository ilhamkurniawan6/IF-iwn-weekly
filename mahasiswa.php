<?php
require 'fungsi.php';
require_login();

$qmahasiswa = "SELECT * FROM mahasiswa";
$mahasiswas = tampildata($qmahasiswa);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa | Informatika</title>
    <link rel="stylesheet" href="style.css?v=3">
</head>
<body>
    <h1>INFORMATIKA 2026</h1>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th><a href="index.php">Home</a></th>
            <th><a href="profile.php">Profile</a></th>
            <th><a href="kontak.php">Contact</a></th>
            <th><a href="mahasiswa.php">Mahasiswa</a></th>
            <?php if (is_logged_in()): ?>
                <th><a href="logout.php">Logout (<?= htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') ?>)</a></th>
            <?php else: ?>
                <th><a href="login.php">Login</a></th>
                <th><a href="registrasi.php">Registrasi</a></th>
            <?php endif; ?>
        </tr>
    </table>

    <br>
    <hr>

    <h2>Data Mahasiswa</h2>

    <a href="inputdata.php"><button>Tambah Data</button></a>

    <br><br>

    <div class="table-wrap">
        <table class="mahasiswa-table" border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th class="col-center col-no">No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>No. Hp</th>
                <th class="col-center col-photo">Foto</th>
                <th class="col-center col-action">Aksi</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($mahasiswas as $mhs): ?>
                <?php
                    $nama = htmlspecialchars($mhs['nama'] ?? '', ENT_QUOTES, 'UTF-8');
                    $nim = htmlspecialchars($mhs['nim'] ?? '', ENT_QUOTES, 'UTF-8');
                    $jurusan = htmlspecialchars($mhs['jurusan'] ?? '', ENT_QUOTES, 'UTF-8');
                    $email = htmlspecialchars($mhs['email'] ?? '', ENT_QUOTES, 'UTF-8');
                    $noHp = htmlspecialchars($mhs['no_hp'] ?? '', ENT_QUOTES, 'UTF-8');
                    $fotoFile = trim((string) ($mhs['foto'] ?? ''));
                    $fotoSrc = $fotoFile !== '' ? 'assets/img/' . rawurlencode($fotoFile) : '';
                    $fallbackAvatar = 'data:image/svg+xml;charset=UTF-8,' . rawurlencode(
                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 120"><defs><linearGradient id="g" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#6ea8ff"/><stop offset="100%" stop-color="#7cf0d8"/></linearGradient></defs><circle cx="60" cy="60" r="60" fill="url(#g)"/><circle cx="60" cy="48" r="20" fill="#081120" fill-opacity="0.75"/><path d="M24 102c7-20 21-30 36-30s29 10 36 30" fill="#081120" fill-opacity="0.75"/></svg>'
                    );
                    $displayFoto = $fotoSrc !== '' ? $fotoSrc : $fallbackAvatar;
                ?>
                <tr>
                    <td class="col-center col-no"><?= $i++; ?></td>
                    <td class="col-text col-capitalize"><?= $nama ?></td>
                    <td><?= $nim ?></td>
                    <td class="col-text col-capitalize"><?= $jurusan ?></td>
                    <td class="col-text"><?= $email ?></td>
                    <td><?= $noHp ?></td>
                    <td class="col-center col-photo">
                        <img
                            class="avatar"
                            src="<?= $displayFoto ?>"
                            alt="Foto <?= $nama !== '' ? $nama : 'Mahasiswa' ?>"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='<?= $fallbackAvatar ?>';"
                        >
                    </td>
                    <td class="col-center col-action">
                        <div class="action-buttons">
                            <a class="action-btn action-edit" href="editdata.php?id=<?= $mhs['id']; ?>">Edit</a>
                            <a class="action-btn action-delete" href="hapusdata.php?id=<?= $mhs['id']; ?>" onclick="return confirm('yangggg benerrr😒😒😒😒😒');">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>
</html>