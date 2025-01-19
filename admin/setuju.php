<?php


include '../dbconnect.php';
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


if (isset($_GET['setuju'])) {
    try {
        $id = $_GET['id'];
        $query = "UPDATE userdata SET status_diterima = '1' WHERE userdataid = '$id'";
        $sql = "SELECT useremail, namalengkap FROM userdata JOIN user ON userdata.userid = user.userid WHERE userdataid = '$id'";
        $result = mysqli_query($conn, $query);
        $hasil = mysqli_query($conn, $sql);
        $hasil = mysqli_fetch_assoc($hasil);
        if ($result) {
            // header('location: form.php');
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = 'smtp.gmail.com';  
            $mail->Username = 'umar.ovie@gmail.com'; 
            $mail->Password = 'm f n n g u h y k z h v n q x c';  
            $mail->Port = 465;      
            $mail->SMTPSecure = "ssl";

            $mail->setFrom('umar.ovie@gmail.com', 'Nurul Hidayah');

            $mail->addAddress($hasil['useremail'], $hasil['namalengkap']);


            $mail->isHTML(true);

            $mail->Subject = 'Informasi Pendaftaran Santri Baru';
            $mail->Body    = file_get_contents('./email.html');

            // Send mail   
            if (!$mail->send()) {
                echo 'Email not sent an error was encountered: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent.';
            }

            $mail->smtpClose();
        } else {
            echo "Gagal";
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
};
if (isset($_GET['tolak'])) {
    $id = $_GET['id'];
    $query = "UPDATE userdata SET status_diterima = '0' WHERE userdataid = '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location: form.php');
    } else {
        echo "Gagal";
    }
} else {
    header('location: form.php');
}
