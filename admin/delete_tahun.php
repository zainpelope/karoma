<?php
include '../dbconnect.php';
include '../cek.php';

if ($role !== 'Admin') {
    header("location:../login.php");
}

// Ambil tahun_pelajaran dari parameter URL (bukan id)
$tahun_pelajaran = $_GET['tahun']; // Menggunakan tahun_pelajaran, bukan id

// Pastikan tahun_pelajaran ada
if (!$tahun_pelajaran) {
    die("Tahun tidak ditemukan.");
}

// Hapus data berdasarkan tahun_pelajaran
$query = "DELETE FROM tahun WHERE tahun_pelajaran = '$tahun_pelajaran'";
if (mysqli_query($conn, $query)) {
    header("Location: ../admin/pendaftaran.php"); // Redirect ke halaman index setelah berhasil menghapus
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
