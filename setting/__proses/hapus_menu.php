<?php
include_once('../../koneksi_db/Koneksi.php');
include_once("../../__setting.php");
$table_menu  = TABLE_MENU;

$id_menu= isset($_POST['id_menu']) ? $_POST['id_menu']:"";

$query="DELETE FROM $db.$table_menu where id_menu='$id_menu'";
$ex_query= mysqli_query($con, $query);

if (!$ex_query){
    $pesan = "Gagal Terhapus, Error : ".mysqli_error($con);
}

echo json_encode($pesan);
mysqli_close($con);
