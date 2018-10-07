<?php
include "../../koneksi_db/Koneksi.php";
$table_pesan = TABLE_PESAN;
$id = isset($_POST['id']) ? $_POST['id']:"";

$q = "UPDATE $db.$table_pesan set is_read='1' WHERE id='$id'";
$ex = mysqli_query($con, $q);
$pesan = array();
if(!$ex) {
    $pesan = "Data gagal terhapus, Error : ".mysqli_error($con);
}
mysqli_close($con);
echo json_encode($pesan);
