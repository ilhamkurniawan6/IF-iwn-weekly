<?php
require 'fungsi.php';

if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['login'])) {
    if (login($_POST)) {
        header('Location: index.php');
        exit;
    } else {
        echo "<script>alert('Username atau password salah. Silakan coba lagi.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Login User</h1>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit" name="login">Login</button>
    </form>
    <p>Belum punya akun? <a href="registrasi.php">Register</a></p>
</body>
</html>
