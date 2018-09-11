<?php
include "../../../koneksi_db/Koneksi.php";
$table_jawaban = TABLE_JAWABAN;
$table_pertanyaan = TABLE_PERTANYAAN;
$table_bidang_layanan = TABLE_BIDANG_LAYANAN;
$table_siswa = TABLE_SISWA;
$table_guru = TABLE_GURU;
$created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";

$q3 = "SELECT user_id FROM $db.$table_guru where user_id_login='$created_by'";
$ex_q3 = mysqli_query($con, $q3);
$r3 = mysqli_fetch_assoc($ex_q3);
$id_guru = $r3['user_id'];

$q1 = "SELECT id as id_bidang_layanan, deskripsi as deskripsi_bidang_layanan FROM $db.$table_bidang_layanan";
$ex_q1 = mysqli_query($con, $q1);
$jumlah_bidang_layanan = mysqli_num_rows($ex_q1);
while($r1 = mysqli_fetch_assoc($ex_q1)){
    $data_bidang_layanan[]=$r1;
}

$q4 = "SELECT user_id as user_id_siswa, user_id_login as user_id_login_siswa, nama_lengkap as nama_siswa,
    IF(jenis_kelamin='L','Laki-Laki','Perempuan') as jenis_kelamin_siswa FROM $db.$table_siswa where id_guru='$id_guru' order by nama_lengkap";
$ex_q4 = mysqli_query($con, $q4);
$jumlah_siswa = mysqli_num_rows($ex_q4);
while($r4 = mysqli_fetch_assoc($ex_q4)){
    $j4[] = $r4;
}

// $q6_1 = "SELECT b.user_id AS user_id_siswa,b.nama_lengkap AS nama_lengkap_siswa, a.bidang_layanan, a.id_pertanyaan, a.jawaban
//     FROM $db.$table_jawaban AS a
//     LEFT JOIN $db.$table_siswa AS b ON b.user_id_login = a.user_id
//     LEFT JOIN $db.$table_guru AS c ON b.id_guru = c.user_id
//     WHERE a.bidang_layanan = 1";
// $ex_q6_1 = mysqli_query($con, $q6_1);
// $jum_q6_1 = mysqli_num_rows($ex_q6_1);
// $dr_1=0;
// while($rq6_1=mysqli_fetch_assoc($ex_q6_1)){
//     $j6_1[] = $rq6_1;
//     $jawaban_1 = isset($rq6_1['jawaban']) ? $rq6_1['jawaban']:0;
//     $exp_j6_1 = explode(",",$jawaban_1);
//     for($i=0;$i<$jum_q6_1;$i++){
//         $n = isset($exp_j6_1[$i][0]) ? $exp_j6_1[$i][0]:0;
//     }
//     $dr_1 += $n;
// }

    //echo json_encode($dr_1);

// $q6_2 = "SELECT b.user_id AS user_id_siswa,b.nama_lengkap AS nama_lengkap_siswa, a.bidang_layanan, a.id_pertanyaan, a.jawaban
//     FROM $db.$table_jawaban AS a
//     LEFT JOIN $db.$table_siswa AS b ON b.user_id_login = a.user_id
//     LEFT JOIN $db.$table_guru AS c ON b.id_guru = c.user_id
//     WHERE a.bidang_layanan = 2";
// $ex_q6_2 = mysqli_query($con, $q6_2);
// while($rq6_2=mysqli_fetch_assoc($ex_q6_2)){
//     $j6_2[] = $rq6_2;
// }

// $q6_3 = "SELECT b.user_id AS user_id_siswa,b.nama_lengkap AS nama_lengkap_siswa, a.bidang_layanan, a.id_pertanyaan, a.jawaban
//     FROM $db.$table_jawaban AS a
//     LEFT JOIN $db.$table_siswa AS b ON b.user_id_login = a.user_id
//     LEFT JOIN $db.$table_guru AS c ON b.id_guru = c.user_id
//     WHERE a.bidang_layanan = 3";
// $ex_q6_3 = mysqli_query($con, $q6_3);
// while($rq6_3=mysqli_fetch_assoc($ex_q6_3)){
//     $j6_3[] = $rq6_3;
// }
//
// $q6_4 = "SELECT b.user_id AS user_id_siswa,b.nama_lengkap AS nama_lengkap_siswa, a.bidang_layanan, a.id_pertanyaan, a.jawaban
//     FROM $db.$table_jawaban AS a
//     LEFT JOIN $db.$table_siswa AS b ON b.user_id_login = a.user_id
//     LEFT JOIN $db.$table_guru AS c ON b.id_guru = c.user_id
//     WHERE a.bidang_layanan = 4";
// $ex_q6_4 = mysqli_query($con, $q6_4);
// while($rq6_4=mysqli_fetch_assoc($ex_q6_4)){
//     $j6_4[] = $rq6_4;
// }

//echo $q4;
?>
