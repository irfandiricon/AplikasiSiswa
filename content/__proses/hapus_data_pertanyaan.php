<?php
include "../../koneksi_db/Koneksi.php";
$table_pertanyaan = TABLE_PERTANYAAN;
$id = isset($_POST['id']) ? $_POST['id']:"";

$q = "DELETE FROM $db.$table_pertanyaan WHERE id='$id'";
$ex = mysqli_query($con, $q);
$pesan = array();

if(!$ex) {
    $pesan = "Data gagal terhapus, Error : ".mysqli_error($con);
}

echo json_encode($pesan);
mysqli_close($con);
