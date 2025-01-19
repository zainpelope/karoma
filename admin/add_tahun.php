<?php
include '../dbconnect.php';
include '../cek.php';

if ($role !== 'Admin') {
    header("location:../login.php");
}


if (isset($_POST['submit'])) {

    $tahun_pelajaran = $_POST['tahun_pelajaran'];
    $tanggal_tutup = $_POST['tanggal_tutup'];
    $batas = $_POST['batas'];

    $currentDate = date('Y-m-d');
    if ($currentDate < $tanggal_tutup) {
        $status = 1;
    } else {
        $status = 0;
    }


    $query = "INSERT INTO tahun (tahun_pelajaran, tanggal_tutup, batas, status) 
              VALUES ('$tahun_pelajaran', '$tanggal_tutup', '$batas', '$status')";

    if (mysqli_query($conn, $query)) {
        header("Location: ../admin/pendaftaran.php");
    } else {
        echo "Gagal menambah data: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Tahun Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h3 class="m-0">Tambah Tahun Pendaftaran</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="tahun_pelajaran" class="form-label">Tahun Pelajaran</label>
                        <input type="text" class="form-control" id="tahun_pelajaran" name="tahun_pelajaran" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_tutup" class="form-label">Batas Pendaftaran</label>
                        <input type="date" class="form-control" id="tanggal_tutup" name="tanggal_tutup" required>
                    </div>
                    <div class="mb-3">
                        <label for="batas" class="form-label">Batas Jumlah Pendaftar</label>
                        <input type="number" class="form-control" id="batas" name="batas" required>
                    </div>

                    <input type="hidden" name="status" value="<?= isset($status) ? $status : '' ?>">

                    <div class="d-flex justify-content-between">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="bi bi-check-circle"></i> Tambah</button>
                        <a href="../admin/pendaftaran.php" class="btn btn-secondary btn-lg"><i class="bi bi-x-circle"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</body>

</html>