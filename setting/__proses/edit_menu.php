<?php
include_once('../../koneksi_db/Koneksi.php');
include_once("../../__setting.php");
$table_menu  = TABLE_MENU;

$id_menu= isset($_POST['id_menu']) ? $_POST['id_menu']:"";
$nama_menu= isset($_POST['nama_menu']) ? $_POST['nama_menu']:"";
$path= isset($_POST['path']) ? $_POST['path']:"";
$nama_file= isset($_POST['nama_file']) ? $_POST['nama_file']:"";
$status_aktif= isset($_POST['status_aktif']) ? $_POST['status_aktif']:0;
$USER_ID=isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";

if($status_aktif=="Aktif"){
    $status='1';
}else{
    $status='0';
}

$query="UPDATE $db.$table_menu SET nama_menu='$nama_menu',path='$path',nama_file='$nama_file',"
        . "flag_aktif='$status' where id_menu='$id_menu'";
$ex_query= mysqli_query($con, $query);

if ($ex_query){
    $pesan = "Berhasil Tersimpan !!!";
}else{
    $pesan = "Gagal Tersimpan, Error : ".mysqli_error($con);
}

echo json_encode($pesan);
mysqli_close($con);
