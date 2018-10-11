<?php
include "../../koneksi_db/Koneksi.php";
$table_download = TABLE_DOWNLOAD;
$id = isset($_POST['id']) ? $_POST['id']:"";

$q1 = "SELECT path_file FROM $db.$table_download WHERE id='$id'";
$ex_q1 = mysqli_query($con, $q1);
$row = mysqli_fetch_assoc($ex_q1);
$path_file = $row['path_file'];
$jum = mysqli_num_rows($ex_q1);

if($jum > 0){
    $dir = "../../file_upload/".$path_file;
    $del = unlink($dir);
    if($del){
        $q = "DELETE FROM $db.$table_download WHERE id='$id'";
        $ex = mysqli_query($con, $q);
        $pesan = array();
        if(!$ex) {
            $pesan = "Data gagal terhapus, Error : ".mysqli_error($con);
        }
    }
}else{
    $pesan = "Data tidak ditemukan, Error : ".mysqli_error($con);
}

echo json_encode($pesan);
mysqli_close($con);
