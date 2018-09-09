<?php
    include "../../koneksi_db/Koneksi.php";
    $json = array();
    $table_sekolah = TABLE_SEKOLAH;
    $id_sekolah = isset($_POST['id_sekolah']) ? $_POST['id_sekolah']:"";
    $q = "SELECT alamat as alamat_sekolah, no_telpon as no_telepon_sekolah FROM $db.$table_sekolah where id='$id_sekolah'";
    $ex_q = mysqli_query($con, $q);
    $res = mysqli_fetch_assoc($ex_q);
    $alamat_sekolah = $res['alamat_sekolah'];
    $no_telepon_sekolah = $res['no_telepon_sekolah'];

    $json = array("alamat_sekolah" => $alamat_sekolah, "no_telepon_sekolah" => $no_telepon_sekolah);
    echo json_encode($json);
    mysqli_close($con);
?>
