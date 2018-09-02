<?php
include "../../koneksi_db/Koneksi.php";
$table_sekolah = TABLE_SEKOLAH;
$query = "SELECT id, nama, alamat, no_telpon FROM $db.$table_sekolah WHERE flag_aktif='Y'";
$ex_query = mysqli_query($con, $query);
$json = array();
while($rows = mysqli_fetch_assoc($ex_query)){
    $json[] = $rows;
}

$data = array("data" => $json);
echo json_encode($data);
mysqli_close($con);
