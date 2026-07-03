<?php
    require 'fungsi.php';

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
    <title>Register</title>
</head>
<body>
    <h1>Register User</h1>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" name="confirm_password" id="confirm_password" required>

        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>