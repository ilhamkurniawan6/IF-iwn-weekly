<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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

    if (!pastikan_tabel_users()) {
        echo "<script>alert('Tabel users gagal dibuat. Cek hak akses database.')</script>";
        return false;
    }

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($koneksi, $data['password']);
    $confirm_password = mysqli_real_escape_string($koneksi, $data['confirm_password']);

    $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username sudah terdaftar!');</script>";
        return false;
    }

    if ($password !== $confirm_password) {
        echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
        return false;
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $username = mysqli_real_escape_string($koneksi, $username);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password_hash')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function login($data)
{
    global $koneksi;

    if (!pastikan_tabel_users()) {
        return false;
    }

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($koneksi, $data['password']);

    $username = mysqli_real_escape_string($koneksi, $username);
    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            return true;
        }
    }

    return false;
}

function is_logged_in()
{
    return !empty($_SESSION['username']);
}

function require_login()
{
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}
?>