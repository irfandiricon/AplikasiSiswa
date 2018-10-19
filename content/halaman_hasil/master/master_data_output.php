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
    IF(jenis_kelamin='L','Laki-Laki','Perempuan') as jenis_kelamin_siswa FROM $db.$table_siswa where id_guru='$id_guru' and flag_aktif='Y'
    order by nama_lengkap";
$ex_q4 = mysqli_query($con, $q4);
$jumlah_siswa = mysqli_num_rows($ex_q4);
while($r4 = mysqli_fetch_assoc($ex_q4)){
    $j4[] = $r4;
}
?>
