<?php
include "../../koneksi_db/Koneksi.php";
$table_sekolah = TABLE_SEKOLAH;
$id = isset($_POST['id']) ? $_POST['id']:"";
$created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";

$q = "UPDATE $db.$table_sekolah SET deleted_date=now(), deleted_by='$created_by', flag_aktif='N'
      WHERE id='$id'";
$ex = mysqli_query($con, $q);
$pesan = array();

if(!$ex) {
    $pesan = "Data gagal terhapus, Error : ".mysqli_error($con);
}

echo json_encode($pesan);
mysqli_close($con);
