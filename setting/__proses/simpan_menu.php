<?php
include_once('../../koneksi_db/Koneksi.php');
include_once("../../__setting.php");
$table_menu  = TABLE_MENU;

$id_group_menu = isset($_POST['id_group_menu']) ? $_POST['id_group_menu']:"";
$nama_menu = isset($_POST['nama_menu']) ? $_POST['nama_menu']:"";
$path = isset($_POST['path']) ? $_POST['path']:"";
$nama_file = isset($_POST['nama_file']) ? $_POST['nama_file']:"";
$USER_ID=isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";

$query="INSERT INTO $DB.$table_menu(id_group_menu,nama_menu,path,nama_file,created_date,created_by)"
        . " values ('$id_group_menu','$nama_menu','$path','$nama_file',now(),'$USER_ID')";
$ex_query= mysqli_query($con, $query);

if ($ex_query){
    echo json_encode('Berhasil Tersimpan');
}else{
    echo json_encode(mysqli_error($ex_query));
}
