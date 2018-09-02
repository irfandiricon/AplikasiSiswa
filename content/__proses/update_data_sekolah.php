<?php
include "../../koneksi_db/Koneksi.php";
$table_sekolah = TABLE_SEKOLAH;
$id = isset($_POST['id']) ? $_POST['id']:"";
$nama = isset($_POST['nama']) ? $_POST['nama']:"";
$alamat = addslashes(isset($_POST['alamat']) ? $_POST['alamat']:"");
$no_telepon = isset($_POST['no_telepon']) ? $_POST['no_telepon']:"";
$created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";

$q = "UPDATE $db.$table_sekolah SET nama='$nama', alamat='$alamat', no_telpon='$no_telepon', updated_date=now(), updated_by='$created_by'
      WHERE id='$id'";
$ex = mysqli_query($con, $q);
$pesan = array();

if(!$ex) {
    $pesan = "Data gagal tersimpan, Error : ".mysqli_error($con);
}

echo json_encode($pesan);
mysqli_close($con);
