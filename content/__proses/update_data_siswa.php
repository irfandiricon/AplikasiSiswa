<?php
include "../../koneksi_db/Koneksi.php";
$table_siswa = TABLE_SISWA;
$table_user = TABLE_USER;
$user_id = isset($_POST['user_id']) ? $_POST['user_id']:"";
$flag_aktif= isset($_POST['flag_aktif']) ? $_POST['flag_aktif']:"";
$created_by= isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";

$q = "UPDATE $db.$table_siswa SET flag_aktif='$flag_aktif', updated_date=now(), updated_by='$created_by'
      WHERE user_id_login='$user_id'";
$ex = mysqli_query($con, $q);

$q2 = "UPDATE $db.$table_user SET flag_aktif='$flag_aktif', updated_date=now(), updated_by='$created_by'
      WHERE user_id='$user_id'";
$ex2 = mysqli_query($con, $q2);

$pesan = array();

if(!$ex) {
    $pesan = "Data gagal tersimpan, Error : ".mysqli_error($con);
}

echo json_encode($pesan);
mysqli_close($con);
