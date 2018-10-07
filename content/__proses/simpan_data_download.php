<?php
include "../../koneksi_db/Koneksi.php";
$table_download = TABLE_DOWNLOAD;
$file_location = FILE_LOCATION;
$nama_file = isset($_POST['nama_file']) ? $_POST['nama_file']:"";
$file_name = isset($_FILES['file']['name']) ? $_FILES['file']['name']:"";
$file_tmp_name = isset($_FILES['file']['tmp_name']) ? $_FILES['file']['tmp_name']:"";
$file_type = isset($_FILES['file']['type']) ? $_FILES['file']['type']:"";
$file_size = isset($_FILES['file']['size']) ? $_FILES['file']['size']:"";
$created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id']:0;

$keterangan_file = str_replace(" ","_",strtolower($nama_file));
$file_ext = substr($file_name, strripos($file_name, '.'));
$new_file_name = $keterangan_file.$file_ext;
$target_path = "../../".$file_location.$new_file_name;

if(file_exists($target_path)){
    unlink($target_path);
    $upload = move_uploaded_file($file_tmp_name, $target_path);
}else{
    $upload = move_uploaded_file($file_tmp_name, $target_path);
}
if($upload){
    $q5 = "INSERT INTO $db.$table_download (nama_file, path_file, created_date, created_by)
        values('$nama_file', '$new_file_name', now(), '$created_by')";
    $ex_q5 = mysqli_query($con, $q5);

    if($ex_q5){
        $pesan = "Data berhasil tersimpan !!!";
    }else{
        $pesan = "Data berhasil tersimpan, File lampiran gagal tersimpan !!! ".mysqli_error($con);
    }
}else{
    $pesan = "File gagal terupload !!!";
}

mysqli_close($con);
echo json_encode($pesan);
?>
