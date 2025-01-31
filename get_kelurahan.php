<?php
include 'dbconnect.php';

if(isset($_POST["district_id"])){
    $district_id = $_POST["district_id"];
    $query = mysqli_query($conn, "SELECT * FROM villages WHERE district_id = '$district_id'");
    
    echo '<option value="">Pilih Kelurahan</option>';
    while($row = mysqli_fetch_assoc($query)){
        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
}
?>
