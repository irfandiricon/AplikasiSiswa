<?php
$id_data = array("","Y","N");
$deskripsi_data = array("PILIH DATA","AKTIF","N. AKTIF");
$jumlah = count($id_data);
$json = array();
for($i=0;$i<$jumlah;$i++){
    $id = $id_data[$i];
    $deskripsi = $deskripsi_data[$i];

    $json[] = array("id" => $id, "deskripsi" => $deskripsi);
}
echo json_encode($json);
?>
