<?php
include_once('../../koneksi_db/Koneksi.php');
include_once("../../__setting.php");
$table_group_menu  = TABLE_MENU_GROUP;

$status_aktif= isset($_POST['status_aktif']) ? $_POST['status_aktif']:0;
$font_icon= isset($_POST['font_icon']) ? $_POST['font_icon']:"";
$nama_group_menu= isset($_POST['nama_group_menu']) ? $_POST['nama_group_menu']:"";
$id_group_menu= isset($_POST['id_group_menu']) ? $_POST['id_group_menu']:"";
$USER_ID=isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";

if($status_aktif=="Aktif"){
    $status='1';
}else{
    $status='0';
}

$query="UPDATE $db.$table_group_menu SET font_icon='$font_icon',nama_group_menu='$nama_group_menu',"
        . "flag_aktif='$status' where id_group_menu='$id_group_menu'";
$ex_query= mysqli_query($con, $query);

if ($ex_query){
    $pesan = "Berhasil Tersimpan !!!";
}else{
    $pesan = "Gagal Tersimpan, Error : ".mysqli_error($con);
}

echo json_encode($pesan);
mysqli_close($con);
