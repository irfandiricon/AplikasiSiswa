<?php
include "../../koneksi_db/Koneksi.php";
$table_about = TABLE_ABOUT;
$isi = isset($_POST['isi']) ? $_POST['isi']:"";
$keterangan = stripslashes($isi);
$created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";

$qc = "SELECT COUNT(*) as total FROM $db.$table_about";
$ex_qc = mysqli_query($con, $qc);
$row = mysqli_fetch_assoc($ex_qc);
$total = $row['total'];

if($total == 0){
    $q = "INSERT INTO $db.$table_about (isi, created_date, created_by) values ('$keterangan',now(),'$created_by')";
}else{
    $q = "UPDATE $db.$table_about SET isi='$isi', updated_date=now(), updated_by='$created_by'";
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
