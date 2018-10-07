<?php
include "../../koneksi_db/Koneksi.php";
$table_home = TABLE_HOME;
$id = isset($_POST['id']) ? $_POST['id']:"";
$created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";

$q = "DELETE FROM $db.$table_home WHERE id='$id'";
$ex = mysqli_query($con, $q);
$pesan = array();

if(!$ex) {
    $pesan = "Data gagal terhapus, Error : ".mysqli_error($con);
}

echo json_encode($pesan);
mysqli_close($con);
