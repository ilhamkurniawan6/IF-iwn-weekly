<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
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
    <a href="inputdata.php"><button>Tambah Data</button></a>
    <h2>Data Mahasiswa</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th >NO</th>
            <th >Nama</th>
            <th >NIM</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>No. HP</th>
            <th >Foto</th>
            <th >Aksi</th>
            
        </tr>
        
        <tr>
            <td align="center">1</td>
            <td>Nailong</td>
            <td>10101010101</td>
            <td>Informatika</td>
            <td>nailong@example.com</td>
            <td>08123456789</td>
            <td><img src="assets/img/kaprodi.jpg" width="100px" height="100px"></td>
            <td>
                <a href="editdata.php"><button>Edit</button></a>
                |
                <a href="hapusdata.php"><button>Hapus</button></a>
            </td>
        </tr>
        
</body>
</php>