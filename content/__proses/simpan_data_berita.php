<?php
//die(json_encode($_POST));
include "../../koneksi_db/Koneksi.php";
$table_home = TABLE_HOME;
$id = isset($_POST['id']) ? $_POST['id']:0;
$judul = isset($_POST['judul']) ? $_POST['judul']:"";
$isi = isset($_POST['isi']) ? $_POST['isi']:"";
$keterangan = stripslashes($isi);
$created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";

if(empty($id)){
    $q = "INSERT INTO $db.$table_home (judul, isi, created_date, created_by) values ('$judul','$keterangan',now(),'$created_by')";
}else{
    $q = "UPDATE $db.$table_home SET judul='$judul', isi='$isi', updated_date=now(), updated_by='$created_by' WHERE id='$id' ";
}

$ex = mysqli_query($con, $q);
if(!$ex){
    $pesan = "Data gagal tersimpan, Error : ".mysqli_error($con);
}else{
    $pesan = "Data berhasil tersimpan !!!";
}

mysqli_close($con);
echo json_encode($pesan);
?>
