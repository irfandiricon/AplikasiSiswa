<?php
include "../../koneksi_db/Koneksi.php";
$table_metode_layanan = TABLE_METODE_LAYANAN;
$query = "SELECT id, deskripsi FROM $db.$table_metode_layanan";
$ex_query = mysqli_query($con, $query);
$data = array();
$json = array();
while($rows = mysqli_fetch_assoc($ex_query)){
    $data[] = $rows;
}
$json = array("rows" => $data);
echo json_encode($json);
mysqli_close($con);
