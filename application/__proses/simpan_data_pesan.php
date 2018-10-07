<?php
include "../../koneksi_db/Koneksi.php";
$table_pesan = TABLE_PESAN;
$email = isset($_POST['email']) ? $_POST['email']:"";
$no_telp = isset($_POST['no_telp']) ? $_POST['no_telp']:"";
$nama_lengkap = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap']:"";
$subjek = isset($_POST['subjek']) ? $_POST['subjek']:"";
$pesan = isset($_POST['pesan']) ? $_POST['pesan']:"";
$json = array();

if(empty($email) || empty($no_telp) || empty($nama_lengkap) || empty($subjek) || empty($pesan)){
    $isValid = 0;
    $isPesan = "Silahkan Lengkapi Data !!!";
}else{
    $q = "INSERT INTO $db.$table_pesan (email, no_telp, nama_lengkap, subjek, pesan, created_date)
        values ('$email', '$no_telp', '$nama_lengkap', '$subjek', '$pesan', now())";
    $ex = mysqli_query($con, $q);
    if(!$ex){
        $isValid = 0;
        $isPesan = "Data gagal tersimpan, Error : ".mysqli_error($con);
    }else{
        $isValid = 1;
        $isPesan = "Pesan anda berhasil terkirim, silahkan tunggu konfirmasi dari admin... ";
    }
}

$json = array("isValid" => $isValid, "isPesan" => $isPesan);
mysqli_close($con);
echo json_encode($json);
?>
