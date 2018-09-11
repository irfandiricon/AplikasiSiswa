<?php
include "../../koneksi_db/Koneksi.php";
$table_jawaban = TABLE_JAWABAN;
$id_bidang_layanan = isset($_POST['id_bidang_layanan']) ? $_POST['id_bidang_layanan']:"";
$id_pertanyaan = isset($_POST['id_pertanyaan']) ? $_POST['id_pertanyaan']:"";
$jawaban = isset($_POST['jawaban']) ? $_POST['jawaban']:"";
$created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";
$jumlah = count($id_pertanyaan);
foreach($jawaban as $option_num => $option_val){
    $data_2[] = $option_val;
}
$hasil = array_sum($data_2);
$persentase = ($hasil / (5 * $jumlah)) * 100 ;

for($i=0;$i<$jumlah;$i++){
    $data_1[] = $id_pertanyaan[$i];
}
$data_pertanyaan = implode(",",$data_1);
$data_jawaban = implode(",",$data_2);

$json = array("isValid"=>0, "isPesan"=>array());
$q1 = "INSERT INTO $db.$table_jawaban (user_id, bidang_layanan, id_pertanyaan, jawaban, jumlah, persentase, created_date)
  values ('$created_by', '$id_bidang_layanan', '$data_pertanyaan', '$data_jawaban', '$hasil', '$persentase', now())";
$ex_q1 = mysqli_query($con, $q1);
if(!$ex_q1){
    $isValid = 0;
    $isPesan = "Data gagal diproses, Silahkan hubungi administrator, Error : ".mysqli_error($con);
}else{
    $isValid = 1;
    $isPesan = "Data berhasil tersimpan !!!";
}
$json = array("isValid"=>$isValid, "isPesan"=>$isPesan);
echo json_encode($json);
mysqli_close($con);
?>
