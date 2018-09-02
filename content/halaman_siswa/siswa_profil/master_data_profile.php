<?php
include "../../../koneksi_db/Koneksi.php";
$username = isset($_SESSION['username']) ? $_SESSION['username']:"";
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";
$table_siswa = TABLE_SISWA;
$table_user = TABLE_USER;
$table_sekolah = TABLE_SEKOLAH;
$q1 = "SELECT a.*,c.id as id_sekolah, c.nama as nama_sekolah, c.alamat as alamat_sekolah, c.no_telpon as no_telepon_sekolah
    FROM $db.$table_siswa as a INNER JOIN $db.$table_user as b ON a.user_id_login = b.user_id
    LEFT JOIN $db.$table_sekolah as c ON a.id_sekolah = c.id
    WHERE b.user_id='$user_id'";
$ex_q1 = mysqli_query($con, $q1);
$r1 = mysqli_fetch_assoc($ex_q1);
$nis = $r1['nis'];
$nama_lengkap = $r1['nama_lengkap'];
$tempat_lahir = $r1['tempat_lahir'];
$tanggal_lahir = isset($r1['tanggal_lahir']) ? $r1['tanggal_lahir']:"0000-00-00";
$jenis_kelamin = $r1['jenis_kelamin'];
$alamat = $r1['alamat'];
$email = $r1['email'];
$no_telp = $r1['no_telp'];
$id_sekolah = $r1['id_sekolah'];
$nama_sekolah = $r1['nama_sekolah'];
$alamat_sekolah = $r1['alamat_sekolah'];
$no_telepon_sekolah = $r1['no_telepon_sekolah'];
$user_id = $r1['user_id'];
$user_id_login = $r1['user_id_login'];
$kelas = $r1['kelas'];

list($y,$m,$d) = explode("-",$tanggal_lahir);
$tgl_lahir = "$d/$m/$y";
?>
