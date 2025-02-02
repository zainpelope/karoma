<?php
include '../dbconnect.php';
include '../cek.php';
if ($role!== 'Admin') {
    header("location:../login.php");
}?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Data Pendaftar Diterima</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Data Pendaftar Diterima</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover text-center" id="table-diterima">
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
                    $no = 1;
                    $terima = mysqli_query($conn, "SELECT * FROM userdata WHERE status_diterima = 1");
                    while ($data = mysqli_fetch_array($terima)) {
                  ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $data['namalengkap']?></td>
                            <td><?php echo $data['nisn']?></td>
                            <td><?php echo $data['tglkonfirmasi']?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="view.php?u=<?php echo $data['userid'];?>">
                                    <i class="bi bi-eye"></i> Lihat Detail
                                </a>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm disabled">
                                    <i class="bi bi-check-circle"></i> Diterima
                                </button>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>