<?php
include_once('../../koneksi_db/Koneksi.php');
include_once("../../__setting.php");
$table_group_menu  = TABLE_MENU_GROUP;

$id_group_menu= isset($_POST['id_group_menu']) ? $_POST['id_group_menu']:"";

$query="DELETE FROM $db.$table_group_menu where id_group_menu='$id_group_menu'";
$ex_query= mysqli_query($con, $query);

if (!$ex_query){
    $pesan = "Gagal Terhapus, Error : ".mysqli_error($con);
}

echo json_encode($pesan);
mysqli_close($con);
