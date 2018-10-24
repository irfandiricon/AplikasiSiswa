<?php
include "../master/master_data_output.php";

if($jumlah_siswa==0){
    echo "<div align='center' valign='center'><font size='6' color='red'><b>Maaf, Anda belum memiliki siswa !!!</b></font></div>";
    exit();
}

foreach($data_bidang_layanan as $bidang_layanan){
    $deskripsi_bidang_layanan = $bidang_layanan['deskripsi_bidang_layanan'];
    $id_bidang_layanan = $bidang_layanan['id_bidang_layanan'];

    $q2 = "SELECT COUNT(*) as total_pertanyaan FROM $db.$table_pertanyaan
        WHERE bidang_layanan='$id_bidang_layanan'";
    $ex_q2 = mysqli_query($con, $q2);
    while($r2 = mysqli_fetch_array($ex_q2)){
        $total_soal_perbidang = $r2['total_pertanyaan'];
        $jumlah_soal_perbidang[] = $r2['total_pertanyaan'];
    }
}
$jumlah_soal_perbidang = implode(",",$jumlah_soal_perbidang);
list($s1,$s2,$s3,$s4) = explode(",",$jumlah_soal_perbidang);

foreach($j4 as $json4){
    $nama_siswa = $json4['nama_siswa'];
    $jenis_kelamin_siswa = $json4['jenis_kelamin_siswa'];
    $user_id_login_siswa = $json4['user_id_login_siswa'];

    $qq1 = "SELECT id_pertanyaan, jawaban, jumlah, persentase FROM $db.$table_jawaban
        WHERE user_id='$user_id_login_siswa' and bidang_layanan=1";
    $ex_qq1 = mysqli_query($con, $qq1);
    $res_qq1 = mysqli_fetch_assoc($ex_qq1);
    $jum_qq1 = mysqli_num_rows($ex_qq1);
    $idp_1 = $res_qq1['id_pertanyaan'];
    $jawaban_1 = $res_qq1['jawaban'];
    $exp_dj_1 = explode(",",$jawaban_1);
    $dj_1 = array($exp_dj_1);

    $qq2 = "SELECT id_pertanyaan, jawaban, jumlah, persentase FROM $db.$table_jawaban
        WHERE user_id='$user_id_login_siswa' and bidang_layanan=2";
    $ex_qq2 = mysqli_query($con, $qq2);
    $res_qq2 = mysqli_fetch_assoc($ex_qq2);
    $jum_qq2 = mysqli_num_rows($ex_qq2);
    $idp_2 = $res_qq2['id_pertanyaan'];
    $jawaban_2 = $res_qq2['jawaban'];
    $exp_dj_2 = explode(",",$jawaban_2);
    $dj_2 = array($exp_dj_2);

    $qq3 = "SELECT id_pertanyaan, jawaban, jumlah, persentase FROM $db.$table_jawaban
        WHERE user_id='$user_id_login_siswa' and bidang_layanan=3";
    $ex_qq3 = mysqli_query($con, $qq3);
    $res_qq3 = mysqli_fetch_assoc($ex_qq3);
    $jum_qq3 = mysqli_num_rows($ex_qq3);
    $idp_3 = $res_qq3['id_pertanyaan'];
    $jawaban_3 = $res_qq3['jawaban'];
    $exp_dj_3 = explode(",",$jawaban_3);
    $dj_3 = array($exp_dj_3);

    $qq4 = "SELECT id_pertanyaan, jawaban, jumlah, persentase FROM $db.$table_jawaban
        WHERE user_id='$user_id_login_siswa' and bidang_layanan=4";
    $ex_qq4 = mysqli_query($con, $qq4);
    $res_qq4 = mysqli_fetch_assoc($ex_qq4);
    $jum_qq4 = mysqli_num_rows($ex_qq4);
    $idp_4 = $res_qq4['id_pertanyaan'];
    $jawaban_4 = $res_qq4['jawaban'];
    $exp_dj_4 = explode(",",$jawaban_4);
    $dj_4 = array($exp_dj_4);

    $id_1[] = $idp_1;
    $id_2[] = $idp_2;
    $id_3[] = $idp_3;
    $id_4[] = $idp_4;

    $exp_idp_1 = explode(",",$idp_1);
    $exp_idp_2 = explode(",",$idp_2);
    $exp_idp_3 = explode(",",$idp_3);
    $exp_idp_4 = explode(",",$idp_4);

    $n_idp_1 = array($exp_idp_1);
    $n_idp_2 = array($exp_idp_2);
    $n_idp_3 = array($exp_idp_3);
    $n_idp_4 = array($exp_idp_4);
}
for($j=0;$j<$s1;$j++){
    $q6_1 = "SELECT b.user_id AS user_id_siswa,b.nama_lengkap AS nama_lengkap_siswa, a.bidang_layanan, a.id_pertanyaan, a.jawaban
        FROM $db.$table_jawaban AS a
        LEFT JOIN $db.$table_siswa AS b ON b.user_id_login = a.user_id
        LEFT JOIN $db.$table_guru AS c ON b.id_guru = c.user_id
        WHERE a.bidang_layanan = 1 and b.flag_aktif='Y' and c.user_id_login='$created_by'";
    $ex_q6_1 = mysqli_query($con, $q6_1);
    $jum_q6_1 = mysqli_num_rows($ex_q6_1);
    $dr_1=0;
    while($rq6_1=mysqli_fetch_assoc($ex_q6_1)){
        $j6_1[] = $rq6_1;
        $jawaban_1 = isset($rq6_1['jawaban']) ? $rq6_1['jawaban']:0;
        $exp_j6_1 = explode(",",$jawaban_1);
        for($i=0;$i<$jum_q6_1;$i++){
            $n = isset($exp_j6_1[$j][0]) ? $exp_j6_1[$j][0]:0;
        }
        $dr_1 += $n;
    }

    $persentase_dr_1 = ceil(($dr_1 / (5*$jumlah_siswa)) * 100);
    $dp_1[] = $persentase_dr_1;
    $arr_dr_1[] = $persentase_dr_1;

}

for($j=0;$j<$s2;$j++){
    $q6_2 = "SELECT b.user_id AS user_id_siswa,b.nama_lengkap AS nama_lengkap_siswa, a.bidang_layanan, a.id_pertanyaan, a.jawaban
        FROM $db.$table_jawaban AS a
        LEFT JOIN $db.$table_siswa AS b ON b.user_id_login = a.user_id
        LEFT JOIN $db.$table_guru AS c ON b.id_guru = c.user_id
        WHERE a.bidang_layanan = 2 and b.flag_aktif='Y' and c.user_id_login='$created_by'";
    $ex_q6_2 = mysqli_query($con, $q6_2);
    $jum_q6_2 = mysqli_num_rows($ex_q6_2);
    $dr_2=0;
    while($rq6_2=mysqli_fetch_assoc($ex_q6_2)){
        $j6_2[] = $rq6_2;
        $jawaban_2 = isset($rq6_2['jawaban']) ? $rq6_2['jawaban']:0;
        $exp_j6_2 = explode(",",$jawaban_2);
        for($i=0;$i<$jum_q6_2;$i++){
            $n = isset($exp_j6_2[$j][0]) ? $exp_j6_2[$j][0]:0;
        }
        $dr_2 += $n;
    }
    $persentase_dr_2 = ceil(($dr_2 / (5*$jumlah_siswa)) * 100);
    $dp_2[] = $persentase_dr_2;
    $arr_dr_2[] = $persentase_dr_2;
}

for($j=0;$j<$s3;$j++){
    $q6_3 = "SELECT b.user_id AS user_id_siswa,b.nama_lengkap AS nama_lengkap_siswa, a.bidang_layanan, a.id_pertanyaan, a.jawaban
        FROM $db.$table_jawaban AS a
        LEFT JOIN $db.$table_siswa AS b ON b.user_id_login = a.user_id
        LEFT JOIN $db.$table_guru AS c ON b.id_guru = c.user_id
        WHERE a.bidang_layanan = 3 and b.flag_aktif='Y' and c.user_id_login='$created_by'";
    $ex_q6_3 = mysqli_query($con, $q6_3);
    $jum_q6_3 = mysqli_num_rows($ex_q6_3);
    $dr_3=0;
    while($rq6_3=mysqli_fetch_assoc($ex_q6_3)){
        $j6_3[] = $rq6_3;
        $jawaban_3 = isset($rq6_3['jawaban']) ? $rq6_3['jawaban']:0;
        $exp_j6_3 = explode(",",$jawaban_3);
        for($i=0;$i<$jum_q6_3;$i++){
            $n = isset($exp_j6_3[$j][0]) ? $exp_j6_3[$j][0]:0;
        }
        $dr_3 += $n;
    }
    $persentase_dr_3 = ceil(($dr_3 / (5*$jumlah_siswa)) * 100);
    $dp_3[] = $persentase_dr_3;
    $arr_dr_3[] = $persentase_dr_3;
}

for($j=0;$j<$s4;$j++){
    $q6_4 = "SELECT b.user_id AS user_id_siswa,b.nama_lengkap AS nama_lengkap_siswa, a.bidang_layanan, a.id_pertanyaan, a.jawaban
        FROM $db.$table_jawaban AS a
        LEFT JOIN $db.$table_siswa AS b ON b.user_id_login = a.user_id
        LEFT JOIN $db.$table_guru AS c ON b.id_guru = c.user_id
        WHERE a.bidang_layanan = 4 and b.flag_aktif='Y' and c.user_id_login='$created_by'";
    $ex_q6_4 = mysqli_query($con, $q6_4);
    $jum_q6_4 = mysqli_num_rows($ex_q6_4);
    $dr_4=0;
    while($rq6_4=mysqli_fetch_assoc($ex_q6_4)){
        $j6_4[] = $rq6_4;
        $jawaban_4 = isset($rq6_4['jawaban']) ? $rq6_4['jawaban']:0;
        $exp_j6_4 = explode(",",$jawaban_4);
        for($i=0;$i<$jum_q6_4;$i++){
            $n = isset($exp_j6_4[$j][0]) ? $exp_j6_4[$j][0]:0;
        }
        $dr_4 += $n;
    }
    $persentase_dr_4 = ceil(($dr_4 / (5*$jumlah_siswa)) * 100);
    $dp_4[] = $persentase_dr_4;
    $arr_dr_4[] = $persentase_dr_4;
}

$avr_persentase_dr_1 = array_sum($arr_dr_1) / count($arr_dr_1) ;
$avr_persentase_dr_2 = array_sum($arr_dr_2) / count($arr_dr_2) ;
$avr_persentase_dr_3 = array_sum($arr_dr_3) / count($arr_dr_3) ;
$avr_persentase_dr_4 = array_sum($arr_dr_4) / count($arr_dr_4) ;

$data_per_bidang = array($avr_persentase_dr_1, $avr_persentase_dr_2, $avr_persentase_dr_3, $avr_persentase_dr_4);
$total_soal = $s1+$s2+$s3+$s4;

$jum_1 = count($id_1);
for($i=0;$i<1;$i++){
    $idj_1 = $id_1[$i];
    if($idj_1 != null){
        $n_id_1[] = $idj_1;
    }
}
$jum_2 = count($id_2);
for($i=0;$i<1;$i++){
    $idj_2 = $id_2[$i];
    if($idj_2 != null){
        $n_id_2[] = $idj_2;
    }
}
$jum_3 = count($id_3);
for($i=0;$i<1;$i++){
    $idj_3 = $id_3[$i];
    if($idj_3 != null){
        $n_id_3[] = $idj_3;
    }
}
$jum_4 = count($id_4);
for($i=0;$i<1;$i++){
    $idj_4 = $id_4[$i];
    if($idj_4 != null){
        $n_id_4[] = $idj_4;
    }
}

$idn_1 = implode(",",$n_id_1);
$idn_2 = implode(",",$n_id_2);
$idn_3 = implode(",",$n_id_3);
$idn_4 = implode(",",$n_id_4);

$idp_11 = implode(",",$dp_1);
$idp_12 = implode(",",$dp_2);
$idp_13 = implode(",",$dp_3);
$idp_14 = implode(",",$dp_4);
//echo join(array($idn_1,$idn_2));
$merge_idp_1 = join(array($idn_1,",",$idn_2,",",$idn_3,",",$idn_4));
$merge_per_butir = join(array($idp_11,",",$idp_12,",",$idp_13,",",$idp_14));

$id_ex_1 = explode(",",$merge_idp_1);
$text_ex_1 = explode(",",$merge_per_butir);

$jum = count($text_ex_1);
$data_akhir = array();
$id_terpilih = array();
$data = array(0);
for($i=0;$i<$jum;$i++){
    $d_id = $id_ex_1[$i];
    $n_jwb = $text_ex_1[$i];

    if($n_jwb >= 25 && $n_jwb <= 50){
        $data_akhir[] = array("id" => $d_id, "value" => $n_jwb);
    }
}

$jum_data = COUNT($data_akhir);
if($jum_data == 0){
    $pesan = " Data tidak tersedia !!!";
}else{
    for($i=0;$i<$jum_data;$i++){
        $id_terpilih[] = $data_akhir[$i]['id'];
    }
}
foreach($id_terpilih as $key_id){
    $data[] = $key_id;
}

$id = implode(",",$data);

$q = "SELECT id,pertanyaan, rumusan_kebutuhan, rumusan_tujuan FROM $db.$table_pertanyaan WHERE id IN ($id) and data_khusus='1'";
$ex = mysqli_query($con, $q);
?>

<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <td colspan="3">
                <font size="4"><b>Konseling Kelompok</b></font>
            </td>
        </tr>
        <tr>
            <td width="10">No</td>
            <td width="350">Hasil Angket</td>
            <td width="350">Rumusan Kebutuhan</td>
            <td width="350">Rumusan Tujuan</td>
        </tr>
        <?php
        $no = 1;

        while($row = mysqli_fetch_assoc($ex)){
            $pertanyaan = $row['pertanyaan'];
            $rumusan_kebutuhan = $row['rumusan_kebutuhan'];
            $rumusan_tujuan = $row['rumusan_tujuan'];
        ?>
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $pertanyaan;?></td>
            <td><?php echo $rumusan_kebutuhan;?></td>
            <td><?php echo $rumusan_tujuan;?></td>
        </tr>
      <?php } ?>
    </thead>
</table>
<hr width="100%">
