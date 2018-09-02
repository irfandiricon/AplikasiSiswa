<?php
include "../../koneksi_db/Koneksi.php";
$table_sekolah = TABLE_SEKOLAH;
$nama = isset($_POST['nama']) ? $_POST['nama']:"";
$alamat = addslashes(isset($_POST['alamat']) ? $_POST['alamat']:"");
$no_telepon = isset($_POST['no_telepon']) ? $_POST['no_telepon']:"";
$created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";

$q = "INSERT INTO $db.$table_sekolah (nama, alamat, no_telpon, created_date, created_by) values ('$nama', '$alamat', '$no_telepon', now(), '$created_by')";
$ex = mysqli_query($con, $q);
$pesan = array();

if(!$ex) {
    $pesan = "Data gagal tersimpan, Error : ".mysqli_error($con);
}

echo json_encode($pesan);
mysqli_close($con);
