<?php
include_once('../../koneksi_db/Koneksi.php');
include_once("../../__setting.php");
$table_group_menu  = TABLE_MENU_GROUP;

$font_icon = isset($_POST['font_icon']) ? $_POST['font_icon']:"";
$nama_group_menu = isset($_POST['nama_group_menu']) ? $_POST['nama_group_menu']:"";
$USER_ID = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";

$query="INSERT INTO $db.$table_group_menu(font_icon,nama_group_menu,created_date,created_by)"
        . " values ('$font_icon','$nama_group_menu',now(),'$USER_ID')";
$ex_query= mysqli_query($con, $query);

if ($ex_query){
    $pesan = "Berhasil Tersimpan !!!";
}else{
    $pesan = "Gagal Tersimpan, Error : ".mysqli_error($con);
}

echo json_encode($pesan);
mysqli_close($con);
