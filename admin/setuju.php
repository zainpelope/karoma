<?php
include '../dbconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_GET['setuju'])) {
        // Jika tombol Terima ditekan, ubah status_diterima menjadi 1
        $update = mysqli_query($conn, "UPDATE userdata SET status_diterima = 1 WHERE userdataid = '$id'");
    } elseif (isset($_GET['tolak'])) {
        // Jika tombol Tolak ditekan, ubah status_diterima menjadi 2
        $update = mysqli_query($conn, "UPDATE userdata SET status_diterima = 2 WHERE userdataid = '$id'");
    }

    if ($update) {
        header("location: index.php");
    } else {
        echo "Gagal memperbarui data";
    }
}
?>
