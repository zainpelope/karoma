<?php
include '../../dbconnect.php';


if (isset($_POST['save'])) {
    $tahun = $_POST['tahun'];
    $batas =  $_POST['batas'];
    $batasJumlah = $_POST['batasjumlah'];
    try {
        $sql = "INSERT INTO tahun VALUES (NULL,'$tahun','$batas','$batasJumlah', '0')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script>alert('Data berhasil disimpan');window.location.href='../pendaftaran.php'</script>";
        } else {
            echo "<script>alert('Data gagal disimpan');window.location.href='../pendaftaran.php'</script>";
        }
    } catch (\Throwable $th) {
        echo "<script>alert('Duplikat Tahun Pelajaran');window.location.href='../pendaftaran.php'</script>";
    }
}

if (isset($_GET['id'])) {
    $tahun = $_POST['tahun'];
    $batas =  $_POST['batas'];
    $batasJumlah = $_POST['batasjumlah'];
    $id = $_GET['id'];
    $sql = "UPDATE tahun SET tahun_pelajaran = '$tahun', tanggal_tutup = '$batas', batas = '$batasJumlah' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Data berhasil disimpan');window.location.href='../pendaftaran.php'</script>";
    } else {
        echo "<script>alert('Data gagal disimpan');</script>";
    }
}

if (isset($_GET['id_status'])) {
    $id = $_GET['id_status'];
    $status = $_GET['status'];
    $query = "UPDATE tahun SET status = 0";
    $result = mysqli_query($conn, $query);
    $sql = "UPDATE tahun SET status = $status WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Data berhasil disimpan');window.location.href='../pendaftaran.php'</script>";
    } else {
        echo "<script>alert('Data gagal disimpan');</script>";
    }
}

if (isset($_GET['id_delete'])) {
    $id = $_GET['id_delete'];
    $sql = "DELETE FROM tahun WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Data berhasil dihapus');window.location.href='../pendaftaran.php'</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
    }
}
