<?php
include '../dbconnect.php';
include '../cek.php';
if ($role !== 'Admin') {
    header("location:../login.php");
}

$id = $_GET['id'];
$status = $_GET['status'];

// Ambil data dari database berdasarkan ID
$data = mysqli_query($conn, "SELECT * FROM userdata WHERE userdataid='$id'");
$b = mysqli_fetch_array($data);
?>
<h1>Data Pendaftar Diterima</h1>
<table class="table">
    <tr>
        <th>No</th>
        <td>1</td>
    </tr>
    <tr>
        <th>Nama</th>
        <td><?php echo $b['namalengkap'] ?></td>
    </tr>
    <tr>
        <th>NISN</th>
        <td><?php echo $b['nisn'] ?></td>
    </tr>
    <tr>
        <th>Tanggal Submit</th>
        <td><?php echo $b['tglkonfirmasi'] ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?php echo $status == 'terima' ? 'Diterima' : 'Tidak Diketahui' ?></td>
    </tr>
</table>