<!doctype html>
<html class="no-js" lang="en">
<?php
include '../dbconnect.php';
include '../cek.php';
if ($role !== 'Admin') {
    header("location:../login.php");
}
?>
<head>
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <table id="dataTable3" class="table table-striped table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Tanggal Submit</th>
                        <th>Opsi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $form = mysqli_query($conn, "SELECT * FROM userdata WHERE status='Verified' AND (status_diterima = 0 OR status_diterima IS NULL) ORDER BY userdataid DESC");

                    $no = 1;
                    while ($b = mysqli_fetch_array($form)) {
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $b['namalengkap'] ?></td>
                            <td><?php echo $b['nisn'] ?></td>
                            <td><?php echo $b['tglkonfirmasi'] ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="view.php?u=<?php echo $b['userid']; ?>">
                                    <i class="bi bi-eye"></i> Lihat Detail
                                </a>
                            </td>
                            <td>
                                <a href="setuju.php?id=<?= $b['userdataid'] ?>&setuju=true" class="btn btn-success btn-sm">
                                    <i class="bi bi-check-circle"></i> Terima
                                </a>
                                <a href="setuju.php?id=<?= $b['userdataid'] ?>&tolak=true" class="btn btn-danger btn-sm">
                                    <i class="bi bi-x-circle"></i> Tolak
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
