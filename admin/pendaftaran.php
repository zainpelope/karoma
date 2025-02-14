<!doctype html>
<html class="no-js" lang="en">

<?php
include '../dbconnect.php';
include '../cek.php';
if ($role !== 'Admin') {
    header("location:../login.php");
};

if (isset($_POST['adminbaru'])) {
    $email = $_POST['adminemail'];
    $password = $_POST['adminpassword'];
    $insert = mysqli_query($conn, "insert into admin(adminemail,adminpassword) values('$email','$password')");
    if ($insert) {
        echo " <div class='alert alert-success'>
              Berhasil tambah admin baru.
          </div>
          <meta http-equiv='refresh' content='1; url= admin.php'/>  ";
    } else {
        echo "<div class='alert alert-warning'>
                  Gagal tambah admin baru. Silakan coba lagi nanti.
              </div>
              <meta http-equiv='refresh' content='3; url= admin.php'/> ";
    }
};

?>

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MTS. Nurul Karomah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-144808195-1');
    </script>
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div style="color:white">
                    <h3>MTS. Nurul Karomah</3>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="form.php"><i class="ti-layout"></i><span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="admin.php"><i class="ti-layout"></i><span>Kelola Admin</span></a>
                            </li>

                            <li class="active">
                                <a href="pendaftaran.php">
                                    <i class="ti-layout"></i><span>Manajemen Pendaftaran</span>
                                </a>
                            </li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="header-area py-3 bg-primary text-white">
                <div class="row align-items-center">
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span class="bg-white d-block mb-1" style="height: 3px; width: 25px;"></span>
                            <span class="bg-white d-block mb-1" style="height: 3px; width: 25px;"></span>
                            <span class="bg-white d-block" style="height: 3px; width: 25px;"></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li>
                                <h3 class="fs-5">
                                    <div class="date text-end">
                                        <i class="ti-calendar"></i>
                                        <script type='text/javascript'>
                                            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                            var date = new Date();
                                            var day = date.getDate();
                                            var month = date.getMonth();
                                            var thisDay = date.getDay(),
                                                thisDay = myDays[thisDay];
                                            var yy = date.getYear();
                                            var year = (yy < 1000) ? yy + 1900 : yy;
                                            document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                        </script>
                                    </div>
                                </h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main-content-inner">
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <h3 class="m-0 mr-2">Manajemen Tahun Pendaftaran</h3>
                                </div>
                                <div>
                                    <a href="../admin/laporan.php" class="btn btn-light btn-sm mr-2">Lihat Data Pertahun</a>
                                    <a href="add_tahun.php" class="btn btn-light btn-sm">Tambah Tahun Pendaftaran</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle">
                                        <thead class="table-dark">
                                            <tr>
                                                <th style="width: 5%;">No</th>
                                                <th>Tahun Pelajaran</th>
                                                <th>Batas Pendaftaran</th>
                                                <th>Batas Jumlah Pendaftar</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query = mysqli_query($conn, "SELECT * FROM tahun ORDER BY tahun_pelajaran DESC");
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                $statusClass = $row['status'] == 1 ? 'text-success' : 'text-danger';
                                                $status = $row['status'] == 1 ? 'Aktif' : 'Nonaktif';

                                                echo "<tr>
                                        <td>{$no}</td>
                                        <td>{$row['tahun_pelajaran']}</td>
                                        <td>" . date('d-m-Y', strtotime($row['tanggal_tutup'])) . "</td>
                                        <td>{$row['batas']}</td>
                                        <td class='{$statusClass} font-italic fw-bold'>{$status}</td>
                                        <td>
                                            <a href='edit_tahun.php?tahun={$row['tahun_pelajaran']}' class='btn btn-warning btn-sm'>Edit</a>
                                            <a href='delete_tahun.php?tahun={$row['tahun_pelajaran']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                                        </td>
                                    </tr>";
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../footer.html'); ?>
    </div>


    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <script src="../assets/js/line-chart.js"></script>
    <script src="../assets/js/pie-chart.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>

</body>

</html>