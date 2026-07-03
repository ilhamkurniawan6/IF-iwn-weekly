<?php

$koneksi = mysqli_connect("localhost", "root", "root", "iwn_weekly");

function tampildata($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambahdata($data)
{
    global $koneksi;

    $nama = htmlspecialchars($data['nama'] ?? $data['asma'] ?? '', ENT_QUOTES, 'UTF-8');
    $nim = htmlspecialchars($data['nim'] ?? '', ENT_QUOTES, 'UTF-8');
    $jurusan = htmlspecialchars($data['jurusan'] ?? $data['prodi'] ?? '', ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($data['email'] ?? '', ENT_QUOTES, 'UTF-8');
    $no_hp = htmlspecialchars($data['no_hp'] ?? '', ENT_QUOTES, 'UTF-8');
    $foto = $data['foto'] ?? '';

    $query = "INSERT INTO mahasiswa
            (nama, nim, jurusan, email, no_hp, foto)
            VALUES
            ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$foto')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapusdata($id)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id=$id");

    return mysqli_affected_rows($koneksi);
}

function pastikan_tabel_users()
{
    global $koneksi;

    $query = "CREATE TABLE IF NOT EXISTS users (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(100) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

    return mysqli_query($koneksi, $query);
}

function registrasi($data)
{
    global $koneksi;

    $username = stripslashes($data['username']);
    $password = mysqli_real_escape_string($koneksi, $data['password']);
    $confirm_password = mysqli_real_escape_string($koneksi, $data['confirm_password']);

    // Check if username already exists
   // $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username='$username'");
  //  if (mysqli_fetch_assoc($result)) {
      //  echo "<script>
               // alert('Username sudah terdaftar!');
            //  </script>";
      //  return false;
 // }

        // Check if passwords match
        if ($password !== $confirm_password) {
                echo "<script>
                                alert('Konfirmasi password tidak sesuai!');
                            </script>";
                return false;
        }

        if (!pastikan_tabel_users()) {
                echo "<script>
                                alert('Tabel users gagal dibuat. Cek hak akses database.');
                            </script>";
                return false;
        }

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $username = mysqli_real_escape_string($koneksi, $username);

    // Insert new user into database
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password_hash')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
?>