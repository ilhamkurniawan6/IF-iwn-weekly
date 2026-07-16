<?php
    require 'fungsi.php';

    if (isset($_SESSION['username'])) {
        header('Location: index.php');
        exit;
    }

    if (isset($_POST['register'])) {
        if (registrasi($_POST) > 0) {
            echo "<script>
                    alert('User Berhasil Ditambahkan!');
                    window.location.href='index.php';
                 </script>";
        } else {
            echo "<script>
                    alert('User Gagal Ditambahkan!');
                    window.location.href='registrasi.php';
                 </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Informatika 2026</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="auth-page">
        <section class="auth-card">
            <h1>Daftar Akun Baru</h1>
            <p>Gunakan username dan password yang mudah diingat, lalu login untuk mengakses data Mahasiswa.</p>
            <form action="" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" autofocus required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>

                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" name="confirm_password" id="confirm_password" required>

                <button type="submit" name="register">Register</button>
            </form>
            <div class="auth-footer">
                <span>Sudah punya akun?</span>
                <a href="login.php">Masuk di sini</a>
            </div>
        </section>
    </main>
</body>
</html>