<?php
                session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="assets/styleform.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form method="post" action="">
            <h1>Login</h1>
            <div class="input">
                <input name="username" type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input">
                <input name="password" type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Login</button>
            <?php

                require 'koneksi.php';
                $conn = open_connection();

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $query = "SELECT * FROM login WHERE username = '$username' AND password_hash = MD5('$password')";
                    $hasil = mysqli_query($conn, $query);

                    if ($isi = mysqli_fetch_assoc($hasil)) {
                        $_SESSION['username'] = $isi['username'];
                        header("Location: http://localhost/W-COOP/index.php");
                        exit();
                    } else {
                        echo "<script>alert('Login gagal! Username atau password salah.'); window.location.href='login.php';</script>";
                    }
                }
            ?>
        </form>
    </div>
</body>

</html>