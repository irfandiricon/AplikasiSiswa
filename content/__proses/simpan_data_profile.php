<?php
//die(json_encode($_POST));
include "../../koneksi_db/Koneksi.php";
$table_sekolah = TABLE_SEKOLAH;
$table_siswa = TABLE_SISWA;
$table_user = TABLE_USER;

$json = array("isValid" => 0, "isPesan" => array());
$user_id_siswa = isset($_POST['user_id_siswa']) ? $_POST['user_id_siswa']:"";
$user_id_login = isset($_POST['user_id_login']) ? $_POST['user_id_login']:"";
$nis = isset($_POST['nis']) ? $_POST['nis']:"";
$nama_lengkap = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap']:"";
$tempat_lahir = isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir']:"";
$tanggal_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir']:"0000-00-00";
list($d,$m,$y)=explode("/",$tanggal_lahir);
$tgl_lahir = "$y-$m-$d";
$jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin']:"";
$alamat = addslashes(isset($_POST['alamat']) ? $_POST['alamat']:"");
$email = isset($_POST['email']) ? $_POST['email']:"";
$no_telp = isset($_POST['no_telp']) ? $_POST['no_telp']:"";
$kelas = isset($_POST['kelas']) ? $_POST['kelas']:"";

$nama_sekolah = isset($_POST['nama_sekolah']) ? $_POST['nama_sekolah']:"";
$alamat_sekolah = isset($_POST['alamat_sekolah']) ? $_POST['alamat_sekolah']:"";
$alamat_sekolah = strtoupper($alamat_sekolah);
$no_telepon_sekolah = isset($_POST['no_telepon_sekolah']) ? $_POST['no_telepon_sekolah']:"";
if($nama_sekolah!="dll"){
    $id_sekolah = $nama_sekolah;
}else{
    $nama_sekolah_lainnya = isset($_POST['nama_sekolah_lainnya']) ? $_POST['nama_sekolah_lainnya']:"";
    $nama_sekolah_lainnya = strtoupper($nama_sekolah_lainnya);
    $q1 = "SELECT IF(id IS NULL,0,MAX(id)) + 1 AS id_sekolah FROM $db.$table_sekolah";
    $ex_q1 = mysqli_query($con, $q1);
    $r1 = mysqli_fetch_assoc($ex_q1);
    $id_sekolah = $r1['id_sekolah'];

    $q2 = "INSERT INTO $db.$table_sekolah (id, nama, alamat, no_telpon, created_date, created_by)
        values ('$id_sekolah','$nama_sekolah_lainnya','$alamat_sekolah','$no_telepon_sekolah',now(),'$user_id_login')";
    $ex_q2 = mysqli_query($con, $q2);
    if(!$ex_q2){
        $isValid = 0;
        $isPesan = "Gagal memasukan data sekolah, Error : ".mysqli_error($con);
    }
}

$q3 = "UPDATE $db.$table_siswa SET nis='$nis', nama_lengkap='$nama_lengkap', tempat_lahir='$tempat_lahir', tanggal_lahir='$tgl_lahir',
  jenis_kelamin='$jenis_kelamin', alamat='$alamat', email='$email', no_telp='$no_telp', id_sekolah='$id_sekolah',kelas='$kelas', updated_date=now(),
  updated_by='$user_id_login' where user_id='$user_id_siswa'";
$ex_q3 = mysqli_query($con, $q3);

$q4 = "UPDATE $db.$table_user SET nama_lengkap='$nama_lengkap' WHERE user_id='$user_id_login'" ;
$ex_q4 = mysqli_query($con, $q4);

if(!$ex_q3){
    $isValid = 0;
    $isPesan = "Data gagal diperbaharui, Error : ".mysqli_error($con);
}elseif(!$ex_q4){
    $isValid = 0;
    $isPesan = "Data gagal diperbaharui, Error : ".mysqli_error($con);
}else{
    $isValid = 1;
    $isPesan = "Data berhasil tersimpan !!!";
}

$json = array("isValid" => $isValid, "isPesan" => $isPesan, "query" => $q3);
echo json_encode($json);
mysqli_close($con);
