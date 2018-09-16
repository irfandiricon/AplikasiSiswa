<?php
$id = array("","10","11","12");
$deskripsi = array("PILIH DATA","10","11","12");
$jum = count($id);
$json = array();
for($i=0;$i<$jum;$i++){
    $id_1 = $id[$i];
    $deskripsi_1 = $deskripsi[$i];
    $json[] = array("id" => $id_1, "deskripsi" => $deskripsi_1);
}
echo json_encode($json);
?>
