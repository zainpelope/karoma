<?php
session_start();
include 'dbconnect.php';
$alert = '';

if (isset($_SESSION['role'])) {
    header("location:index.php");
}

if (isset($_POST['btn-daftar'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //cek apakah email sudah pernah digunakan
    $lihat1 = mysqli_query($conn, "select * from user where useremail='$email'");
    $lihat2 = mysqli_num_rows($lihat1);

    if ($lihat2 < 1) {
        //email belum pernah digunakan
        $insert = mysqli_query($conn, "insert into user (useremail,userpassword) values ('$email','$password')");

        if ($insert) {
            $alert = "<div class='alert alert-success'>Berhasil mendaftar, silakan login.</div>";
            echo "<meta http-equiv='refresh' content='2; url=login.php'/>";
        } else {
            $alert = "<div class='alert alert-warning'>Gagal mendaftar, silakan coba lagi.</div>";
        }
    } else {
        //email sudah pernah digunakan
        $alert = "<div class='alert alert-danger'>Email sudah pernah digunakan.</div>";
    }
};




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MTS Nurul Karomah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .login-container img {
            max-width: 100px;
            margin-bottom: 15px;
        }

        .show-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="nurul.png" alt="School Logo" style="width: 150px; height: auto;">
        <h3>Selamat Datang di MTS Nurul Karomah</h3>
        <p class="text-muted">Silakan daftar untuk mengakses sistem</p>

        <!-- Menampilkan alert jika ada -->
        <?php if ($alert != '') echo $alert; ?>

        <form method="post" style="position: relative;">
            <div class="form-group mb-3 position-relative">
                <input type="email" class="form-control" placeholder="Email" name="email" required autofocus>
            </div>
            <div class="form-group mb-3 position-relative">
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                <span class="show-password" onclick="togglePassword()">
                    <i class="bi bi-eye" id="toggle-icon"></i>
                </span>
            </div>
            <button type="submit" class="btn btn-info btn-block w-100 mb-2" name="btn-daftar">Daftar</button>

            <!-- Tambahkan teks dengan link ke halaman login -->
            <p class="mt-3 text-muted">
                Sudah punya akun?
                <a href="login.php" class="text-info">Silakan login</a>
            </p>
        </form>

    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggle-icon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>

</html>