    <!DOCTYPE php>
    <php lang="en">
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
        <form action="proses_input.php" method="post" enctype="multipart/form-data">

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
            <input type="file" name="foto" accept="image/*" required>

            <label>UAS</label>
            <input type="number" name="uas" min="0" max="100" required>

            <label>TUGAS</label>
            <input type="number" name="tugas" min="0" max="100" required>

            <button type="submit">Tambah Data</button>

        </form>
            <hr/>
            <a href="profile.php">Lihat Profil</a>
            <a href="kontak.php">kontak</a>

            <a href="https://tiktok.com" target="_blank">TikTok</a>
        </body>
    </php>