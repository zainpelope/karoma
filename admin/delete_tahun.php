<?php
include '../dbconnect.php';
include '../cek.php';

if ($role !== 'Admin') {
    header("location:../login.php");
    exit();
}

if (isset($_GET['tahun'])) {

    $stmt = $conn->prepare("DELETE FROM tahun WHERE tahun_pelajaran = ?");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $tahun_pelajaran = $_GET['tahun'];
    $stmt->bind_param("s", $tahun_pelajaran);

    if ($stmt->execute()) {

        $_SESSION['pesan'] = "Data tahun pelajaran berhasil dihapus.";
        header("Location: ../admin/pendaftaran.php");
        exit();
    } else {

        $_SESSION['pesan'] = "Gagal menghapus data tahun pelajaran: " . $stmt->error;
        header("Location: ../admin/pendaftaran.php");
        exit();
    }

    $stmt->close();
} else {

    $_SESSION['pesan'] = "Tahun pelajaran tidak ditemukan.";
    header("Location: ../admin/pendaftaran.php");
    exit();
}
