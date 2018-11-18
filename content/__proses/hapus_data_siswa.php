<?php
include "../../koneksi_db/Koneksi.php";
$table_siswa = TABLE_SISWA;
$table_user = TABLE_USER;
$user_id = isset($_POST['user_id_login']) ? $_POST['user_id_login']:"";
$created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";
$jum = COUNT($user_id);
for($i=0;$i<$jum;$i++){
    $data_user[] = $user_id[$i];
}
$id = implode(",",$data_user);

$q = "UPDATE $db.$table_siswa SET deleted_date=now(), deleted_by='$created_by', flag_aktif='N'
      WHERE user_id_login IN ($id)";
$ex = mysqli_query($con, $q);

$q = "UPDATE $db.$table_user SET deleted_date=now(), deleted_by='$created_by', flag_aktif='N'
      WHERE user_id IN ($id)";
$ex = mysqli_query($con, $q);

$pesan = array();

if(!$ex) {
    $pesan = "Data gagal terhapus, Error : ".mysqli_error($con);
}else{
    $pesan = "Data berhasil dihapus !!!";
}

echo json_encode($pesan);
mysqli_close($con);
