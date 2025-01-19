<!doctype html>
<html class="no-js" lang="en">

<?php
include '../dbconnect.php';
include '../cek.php';
if ($role !== 'User') {
    header("location:../login.php");
};
$userid = $_SESSION['userid'];

include 'submit.php';

//cek dulu sudah pernah submit belum
$cekdulu = mysqli_query($conn, "select * from userdata where userid='$userid'");
$lihathasil = mysqli_num_rows($cekdulu);

//kalau udah pernah submit
if ($lihathasil > 0) {
    header("location:mydata.php");
} else {
};
?>

<head>
    <meta charset="utf-8">
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
    <link rel="stylesheet" href="../assets/select2-4.0.6-rc.1/dist/css/select2.min.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-144808195-1');
    </script>
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div style="color:white">
                    <h3>MTS. Nurul Karomah</h3>
                </div>
            </div>

            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="index.php"><span>Dashboard</span></a></li>
                            <li class="active">
                                <a href="daftar.php"><i class="ti-layout"></i><span>Pendaftaran</span></a>
                            </li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>

                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area py-3 bg-primary text-white">
                <div class="row align-items-center">
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span class="bg-white d-block mb-1" style="height: 3px; width: 25px;"></span>
                            <span class="bg-white d-block mb-1" style="height: 3px; width: 25px;"></span>
                            <span class="bg-white d-block" style="height: 3px; width: 25px;"></span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- page title area end -->
            <div class="main-content-inner">

                <!-- panduan -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-primary text-white">
                                <h2 class="mb-0">Pendaftaran</h2>
                            </div>
                            <div class="card-body">
                                <h6 class="fs-5">
                                    Selamat datang di sistem informasi <strong>Penerimaan Peserta Didik Baru (PPDB) Online</strong>.
                                </h6>

                                <hr>
                                <h4 class="fw-bold">Panduan Pendaftaran:</h4>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="fw-bold">1.</span> Isi seluruh formulir yang ditampilkan kemudian periksa kembali, pastikan tidak ada data yang salah.
                                    </li>
                                    <li class="list-group-item">
                                        <span class="fw-bold">2.</span> Klik <span class="badge bg-success">Submit</span>, kemudian klik <span class="badge bg-warning text-dark">Confirm</span>. Setelah di-confirm, data tidak dapat diubah kembali.
                                    </li>
                                    <li class="list-group-item">
                                        <span class="fw-bold">3.</span> Jika sudah, bukti pendaftaran akan ditampilkan dan dapat diunduh menjadi PDF.
                                    </li>
                                </ul>
                                <div class="alert alert-info mt-4">
                                    <strong>Note:</strong> Pihak sekolah baru akan menerima data Anda setelah Anda klik <span class="badge bg-warning text-dark">Confirm</span>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!------------------ Pisahin ------------------->


                <form method="post" enctype="multipart/form-data">
                    <!-- formulir -->
                    <div class="row mt-5 mb-5">
                        <div class="col-12">
                            <div class="card shadow-lg border-0">
                                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                    <h2 class="mb-0">Data Pribadi</h2>
                                    <p class="mb-0 text-white">* Data yang telah diinput tidak dapat diubah kembali, harap isi dengan teliti dan benar</p>

                                </div>
                                <div class="card-body">
                                    <div class="market-status-table mt-4">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">NISN*</label>
                                                    <input name="nisn" type="text" class="form-control" placeholder="NISN" maxlength="12" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">NIK*</label>
                                                    <input name="nik" type="text" class="form-control" placeholder="NIK" maxlength="16" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Nama Lengkap*</label>
                                                    <input name="namalengkap" type="text" class="form-control" placeholder="Nama Lengkap" maxlength="50" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Jenis Kelamin*</label>
                                                    <select class="form-select" name="jeniskelamin">
                                                        <option value="L">Laki-laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Tempat Lahir*</label>
                                                    <input name="tempatlahir" type="text" class="form-control" placeholder="Tempat Lahir" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Tanggal Lahir*</label>
                                                    <input name="tgllahir" type="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="form-label">Alamat Lengkap</label>
                                            <input name="alamat" type="text" class="form-control" placeholder="Alamat" required>
                                        </div>
                                        <div class="row g-3 mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Provinsi*</label>
                                                    <select class="form-select" name="provinsi" id="provinsi">
                                                        <option></option>
                                                        <?php
                                                        $sql_provinsi = mysqli_query($conn, "SELECT * FROM provinces ORDER BY name ASC");
                                                        while ($rs_provinsi = mysqli_fetch_assoc($sql_provinsi)) {
                                                            echo '<option value="' . $rs_provinsi['id'] . '">' . $rs_provinsi['name'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                    <div id="load1" class="spinner-border text-primary mt-2 d-none" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Kota/Kabupaten*</label>
                                                    <select class="form-select" name="kota" id="kota">
                                                        <option></option>
                                                    </select>
                                                    <div id="load2" class="spinner-border text-primary mt-2 d-none" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Kecamatan*</label>
                                                    <select class="form-select" name="kecamatan" id="kecamatan">
                                                        <option></option>
                                                    </select>
                                                    <div id="load3" class="spinner-border text-primary mt-2 d-none" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Kelurahan*</label>
                                                    <select class="form-select" name="kelurahan" id="kelurahan">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Agama*</label>
                                                    <select class="form-select" name="agama">
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Katolik">Katolik</option>
                                                        <option value="Buddha">Buddha</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Konghucu">Konghucu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">No Telepon</label>
                                                    <input name="telepon" type="text" class="form-control" maxlength="15" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5 mb-5">
                        <div class="col-12">
                            <div class="card shadow-lg border-0">
                                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                    <h2 class="mb-0">Data Orang Tua</h2>
                                </div>
                                <div class="card-body">

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ayahnik">NIK Ayah*</label>
                                                <input name="ayahnik" type="text" class="form-control" id="ayahnik" placeholder="NIK Ayah" maxlength="16">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ayahnama">Nama Ayah*</label>
                                                <input name="ayahnama" type="text" class="form-control" id="ayahnama" placeholder="Nama Ayah" maxlength="40">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ayahpendidikan">Pendidikan Ayah</label>
                                                <select class="form-control" name="ayahpendidikan" id="ayahpendidikan">
                                                    <option value="SD">SD</option>
                                                    <option value="SMP">SMP</option>
                                                    <option value="SMA">SMA/SMK/Sederajat</option>
                                                    <option value="S1">S1/Sederajat</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ayahpekerjaan">Pekerjaan Ayah</label>
                                                <select class="form-control" name="ayahpekerjaan" id="ayahpekerjaan">
                                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                    <option value="PHL">Pekerja Harian Lepas</option>
                                                    <option value="TNI/Polri">TNI/Polri</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Pensiun">Pensiun</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ayahpenghasilan">Penghasilan Ayah per bulan</label>
                                                <select class="form-control" name="ayahpenghasilan" id="ayahpenghasilan">
                                                    <option value="<500.000">
                                                        < Rp500.000</option>
                                                    <option value="500.000-1.000.000">Rp500.000-Rp1.500.000</option>
                                                    <option value="1.500.000-3.500.000">Rp1.500.000-Rp3.500.000</option>
                                                    <option value="3.000.000-5.000.000">Rp3.500.000-Rp5.000.000</option>
                                                    <option value="5.000.000-10.000.000">Rp5.000.000-Rp10.000.000</option>
                                                    <option value="10.000.000-20.000.000">Rp10.000.000-Rp20.000.000</option>
                                                    <option value=">20.000.000">> Rp20.000.000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ayahtelepon">No Telepon Ayah</label>
                                                <input name="ayahtelepon" type="text" class="form-control" id="ayahtelepon" maxlength="15">
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ibunik">NIK Ibu*</label>
                                                <input name="ibunik" type="text" class="form-control" id="ibunik" placeholder="NIK Ibu" maxlength="16">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ibunama">Nama Ibu*</label>
                                                <input name="ibunama" type="text" class="form-control" id="ibunama" placeholder="Nama Ibu" maxlength="40">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ibupendidikan">Pendidikan Ibu</label>
                                                <select class="form-control" name="ibupendidikan" id="ibupendidikan">
                                                    <option value="SD">SD</option>
                                                    <option value="SMP">SMP</option>
                                                    <option value="SMA">SMA/SMK/Sederajat</option>
                                                    <option value="S1">S1/Sederajat</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ibupekerjaan">Pekerjaan Ibu</label>
                                                <select class="form-control" name="ibupekerjaan" id="ibupekerjaan">
                                                    <option value="Tidak Bekerja">Ibu Rumah Tangga</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                    <option value="PHL">Pekerja Harian Lepas</option>
                                                    <option value="TNI/Polri">TNI/Polri</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Pensiun">Pensiun</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ibupenghasilan">Penghasilan Ibu per bulan</label>
                                                <select class="form-control" name="ibupenghasilan" id="ibupenghasilan">
                                                    <option value="<500.000">
                                                        < Rp500.000</option>
                                                    <option value="500.000-1.000.000">Rp500.000-Rp1.500.000</option>
                                                    <option value="1.500.000-3.500.000">Rp1.500.000-Rp3.500.000</option>
                                                    <option value="3.000.000-5.000.000">Rp3.500.000-Rp5.000.000</option>
                                                    <option value="5.000.000-10.000.000">Rp5.000.000-Rp10.000.000</option>
                                                    <option value="10.000.000-20.000.000">Rp10.000.000-Rp20.000.000</option>
                                                    <option value=">20.000.000">> Rp20.000.000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ibutelepon">No Telepon Ibu</label>
                                                <input name="ibutelepon" type="text" class="form-control" id="ibutelepon" maxlength="15">
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="walinik">NIK Wali</label>
                                                <input name="walinik" type="text" class="form-control" id="walinik" placeholder="NIK Wali" maxlength="16">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="walinama">Nama Wali</label>
                                                <input name="walinama" type="text" class="form-control" id="walinama" placeholder="Nama Wali" maxlength="40">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="walipendidikan">Pendidikan Wali</label>
                                                <select class="form-control" name="walipendidikan" id="walipendidikan">
                                                    <option value="SD">SD</option>
                                                    <option value="SMP">SMP</option>
                                                    <option value="SMA">SMA/SMK/Sederajat</option>
                                                    <option value="S1">S1/Sederajat</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="walipekerjaan">Pekerjaan Wali</label>
                                                <select class="form-control" name="walipekerjaan" id="walipekerjaan">
                                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                    <option value="PHL">Pekerja Harian Lepas</option>
                                                    <option value="TNI/Polri">TNI/Polri</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Pensiun">Pensiun</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="walipenghasilan">Penghasilan Wali per bulan</label>
                                                <select class="form-control" name="walipenghasilan" id="walipenghasilan">
                                                    <option value="<500.000">
                                                        < Rp500.000</option>
                                                    <option value="500.000-1.000.000">Rp500.000-Rp1.500.000</option>
                                                    <option value="1.500.000-3.500.000">Rp1.500.000-Rp3.500.000</option>
                                                    <option value="3.000.000-5.000.000">Rp3.500.000-Rp5.000.000</option>
                                                    <option value="5.000.000-10.000.000">Rp5.000.000-Rp10.000.000</option>
                                                    <option value="10.000.000-20.000.000">Rp10.000.000-Rp20.000.000</option>
                                                    <option value=">20.000.000">> Rp20.000.000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="walitelepon">No Telepon Wali</label>
                                                <input name="walitelepon" type="text" class="form-control" id="walitelepon" maxlength="15">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row mt-5 mb-5">
                        <div class="col-12">
                            <div class="card shadow-lg border-0">
                                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                    <h2>Data Sekolah Asal & Berkas</h2>
                                    <p class="mb-0 text-white">* Data yang telah diinput tidak dapat diubah kembali, harap isi dengan teliti dan benar</p>

                                </div>
                                <div class="card-body">
                                    <div class="market-status-table mt-4">
                                        <div class="table-responsive" style="overflow-x:hidden;">

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>NPSN Sekolah Asal</label>
                                                        <input name="sekolahnpsn" type="text" class="form-control" placeholder="NPSN Sekolah Asal" maxlength="12">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Nama Sekolah Asal</label>
                                                        <input name="sekolahnama" type="text" class="form-control" placeholder="Nama Sekolah Asal" maxlength="40">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="foto" class=" form-control-label">Pas Foto 4x6 (JPG/PNG), maks 500kb</label>
                                                        <input type="file" id="foto" name="foto" class="form-control-file">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="scanijazahdepan" class=" form-control-label">Scan Ijazah Bagian Depan (JPG/PNG), maks 500kb</label>
                                                        <input type="file" id="scanijazahdepan" name="scanijazahdepan" class="form-control-file">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="scanijazahbelakang" class=" form-control-label">Scan Ijazah Bagian Belakang (JPG/PNG), maks 500kb</label>
                                                        <input type="file" id="scanijazahbelakang" name="scanijazahbelakang" class="form-control-file">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="modal-footer">
                                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>


            <!-- row area start-->
        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <!-- Footer Section -->
    <?php include('../footer.html'); ?>

    <!-- Bootstrap 5 and Icon library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="../assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>
    <script src="../assets/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>
    <script src="../assets/js/app.js"></script>
</body>

</html>