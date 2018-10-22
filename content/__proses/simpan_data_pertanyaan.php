<?php
include "../../koneksi_db/Koneksi.php";
$table_pertanyaan = TABLE_PERTANYAAN;

$pertanyaan = isset($_POST['pertanyaan']) ? $_POST['pertanyaan']:"";
$rumusan_kebutuhan = isset($_POST['rumusan_kebutuhan']) ? $_POST['rumusan_kebutuhan']:"";
$bidang_layanan = isset($_POST['bidang_layanan']) ? $_POST['bidang_layanan']:"";
$strategi_layanan = isset($_POST['strategi_layanan']) ? $_POST['strategi_layanan']:"";
$materi_layanan = isset($_POST['materi_layanan']) ? $_POST['materi_layanan']:"";
$id_media_layanan = isset($_POST['id_media_layanan']) ? $_POST['id_media_layanan']:"";
$rumusan_tujuan = isset($_POST['rumusan_tujuan']) ? $_POST['rumusan_tujuan']:"";
$tujuan_layanan = isset($_POST['tujuan_layanan']) ? $_POST['tujuan_layanan']:"";
$komponen_layanan = isset($_POST['komponen_layanan']) ? $_POST['komponen_layanan']:"";
$id_metode_layanan = isset($_POST['id_metode_layanan']) ? $_POST['id_metode_layanan']:"";
$evaluasi = isset($_POST['evaluasi']) ? $_POST['evaluasi']:"";
$data_khusus = isset($_POST['data_khusus']) ? $_POST['data_khusus']:"";
$target_kelas = isset($_POST['target_kelas']) ? $_POST['target_kelas']:"";
$created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";

$jumlah = count($target_kelas);
for($i=0;$i<$jumlah;$i++){
    $kelas[] = $target_kelas[$i];
}
$data_kelas = implode(",",$kelas);

$json = array("isValid"=>0, "isPesan"=>array());

if(empty($pertanyaan) || empty($rumusan_kebutuhan) || empty($bidang_layanan) || empty($strategi_layanan) || empty($materi_layanan) ||
  empty($id_media_layanan) || empty($rumusan_tujuan) || empty($tujuan_layanan) || empty($komponen_layanan) || empty($id_metode_layanan) ||
  empty($evaluasi) || empty($target_kelas) || empty($data_khusus) || $jumlah==0){
    $isValid = 0;
    $isPesan = "Silahkan lengkapi data !!!";
    $json = array("isValid" => 0, "isPesan" => $isPesan);
}else{
    $q1 = "INSERT INTO $db.$table_pertanyaan (kelas, pertanyaan, rumusan_kebutuhan, rumusan_tujuan, bidang_layanan, tujuan_layanan, komponen_layanan,
        strategi_layanan, materi_layanan, metode_layanan, media_layanan ,evaluasi, data_khusus, created_date, created_by)
        values ('$data_kelas', '$pertanyaan', '$rumusan_kebutuhan', '$rumusan_tujuan', '$bidang_layanan', '$tujuan_layanan', '$komponen_layanan',
        '$strategi_layanan', '$materi_layanan', '$id_metode_layanan', '$id_media_layanan', '$evaluasi', '$data_khusus', now(), '$created_by')";
    $ex_q1 = mysqli_query($con, $q1);
    if(!$ex_q1){
        $isValid = 0;
        $isPesan = "Data gagal tersimpan, Error : ".mysqli_error($con);

        $json = array("isValid" => 0, "isPesan" => $isPesan);
    }else{
        $isValid = 1;
        $isPesan = "Data berhasil tersimpan !!!";

        $json = array("isValid" => 1, "isPesan" => $isPesan);
    }
}

echo json_encode($json);
mysqli_close($con);
