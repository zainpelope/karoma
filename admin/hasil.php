<?php

include '../dbconnect.php';



if ($role !== 'Admin') {
    header("location:../login.php");
}


function prosesData($id, $status)
{
    global $conn;


    $query_get_data = mysqli_query($conn, "SELECT * FROM userdata WHERE userdataid = '$id'");
    $data = mysqli_fetch_assoc($query_get_data);

    if ($data) {

        $query_cek_data = mysqli_query($conn, "SELECT * FROM hasil WHERE userdataid = '$id'");
        if (mysqli_num_rows($query_cek_data) > 0) {

            $query_update_status = mysqli_query($conn, "UPDATE hasil SET status = '$status' WHERE userdataid = '$id'");
        } else {

            $query_insert_hasil = "INSERT INTO hasil (userdataid, userid, nisn, nik, namalengkap, jeniskelamin, tempatlahir, tanggallahir, alamat, provinsi, kabupaten, kecamatan, kelurahan, agama, telepon, ayahnik, ayahnama, ayahpendidikan, ayahpekerjaan, ayahpenghasilan, ayahtelepon, ibunik, ibunama, ibupendidikan, ibupekerjaan, ibupenghasilan, ibutelepon, walinik, walinama, walipekerjaan, walitelepon, sekolahnpsn, sekolahnama, foto, scanijazahdepan, scanijazahbelakang, status, tglkonfirmasi, id_tahun) 
                               VALUES ('{$data['userdataid']}', '{$data['userid']}', '{$data['nisn']}', '{$data['nik']}', '{$data['namalengkap']}', '{$data['jeniskelamin']}', '{$data['tempatlahir']}', '{$data['tanggallahir']}', '{$data['alamat']}', '{$data['provinsi']}', '{$data['kabupaten']}', '{$data['kecamatan']}', '{$data['kelurahan']}', '{$data['agama']}', '{$data['telepon']}', '{$data['ayahnik']}', '{$data['ayahnama']}', '{$data['ayahpendidikan']}', '{$data['ayahpekerjaan']}', '{$data['ayahpenghasilan']}', '{$data['ayahtelepon']}', '{$data['ibunik']}', '{$data['ibunama']}', '{$data['ibupendidikan']}', '{$data['ibupekerjaan']}', '{$data['ibupenghasilan']}', '{$data['ibutelepon']}', '{$data['walinik']}', '{$data['walinama']}', '{$data['walipekerjaan']}', '{$data['walitelepon']}', '{$data['sekolahnpsn']}', '{$data['sekolahnama']}', '{$data['foto']}', '{$data['scanijazahdepan']}', '{$data['scanijazahbelakang']}', '$status', '{$data['tglkonfirmasi']}', '{$data['id_tahun']}')";
            $query_insert = mysqli_query($conn, $query_insert_hasil);
        }

        if ($status === 'Terima') {
            $query_update_status_user = mysqli_query($conn, "UPDATE userdata SET status_diterima = 1 WHERE userdataid = '$id'");
        } else if ($status === 'Tolak') {
            $query_update_status_user = mysqli_query($conn, "UPDATE userdata SET status_diterima = 0 WHERE userdataid = '$id'");
        }

        if ($query_insert || $query_update_status) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}



if (isset($_GET['id']) && isset($_GET['setuju'])) {
    $id = $_GET['id'];
    $status = ($_GET['setuju'] == 'true') ? 'Terima' : 'Tolak';

    if (prosesData($id, $status)) {
        header("location:form.php");
        exit();
    } else {
        echo "Gagal memproses data.";
    }
}


if (isset($_GET['id']) && isset($_GET['tolak'])) {
    $id = $_GET['id'];
    $status = ($_GET['tolak'] == 'true') ? 'Tolak' : 'Terima';

    if (prosesData($id, $status)) {
        header("location:form.php");
        exit();
    } else {
        echo "Gagal memproses data.";
    }
}


?>

<!doctype html>
<html class="no-js" lang="en">

<head>
</head>

<body>
    <div class="main-content-inner my-5">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h4>Data Pendaftar yang Diproses</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable3" class="table table-striped table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Tahun Pelajaran</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $hasil = mysqli_query($conn, "SELECT h.namalengkap, u.tgldaftar, t.tahun_pelajaran, h.status 
                                                              FROM hasil h
                                                              JOIN userdata u ON h.userdataid = u.userdataid
                                                              JOIN tahun t ON h.id_tahun = t.id_tahun
                                                              ORDER BY h.userdataid DESC");
                                    $no = 1;
                                    while ($b = mysqli_fetch_array($hasil)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $b['namalengkap'] ?></td>
                                            <td><?php echo $b['tgldaftar'] ?></td>
                                            <td><?php echo $b['tahun_pelajaran'] ?></td>
                                            <td><?php echo $b['status'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>