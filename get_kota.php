<?php
include 'dbconnect.php';

if(isset($_POST["province_id"])){
    $province_id = $_POST["province_id"];
    $query = mysqli_query($conn, "SELECT * FROM regencies WHERE province_id = '$province_id'");
    
    echo '<option value="">Pilih Kota/Kabupaten</option>';
    while($row = mysqli_fetch_assoc($query)){
        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
}
?>
