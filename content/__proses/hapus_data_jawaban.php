<?php
include "../../koneksi_db/Koneksi.php";
$table_jawaban = TABLE_JAWABAN;
$user_id = isset($_POST['user_id']) ? $_POST['user_id']:"";

$q = "DELETE FROM $db.$table_jawaban WHERE user_id='$user_id'";
$ex = mysqli_query($con, $q);
$pesan = array();

if(!$ex) {
    $pesan = "Data gagal terhapus, Error : ".mysqli_error($con);
}

echo json_encode($pesan);
mysqli_close($con);
