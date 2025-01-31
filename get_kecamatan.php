<?php
include 'dbconnect.php';

if(isset($_POST["regency_id"])){
    $regency_id = $_POST["regency_id"];
    $query = mysqli_query($conn, "SELECT * FROM districts WHERE regency_id = '$regency_id'");
    
    echo '<option value="">Pilih Kecamatan</option>';
    while($row = mysqli_fetch_assoc($query)){
        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
}
?>
