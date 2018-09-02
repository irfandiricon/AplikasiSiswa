<?php
include "../../koneksi_db/Koneksi.php";
$table_media_layanan = TABLE_MEDIA_LAYANAN;
$query = "SELECT id, deskripsi FROM $db.$table_media_layanan";
$ex_query = mysqli_query($con, $query);
$data = array();
$json = array();
while($rows = mysqli_fetch_assoc($ex_query)){
    $data[] = $rows;
}
$json = array("rows" => $data);
echo json_encode($json);
mysqli_close($con);
