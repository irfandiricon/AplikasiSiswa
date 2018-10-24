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

    $jumlah_per_siswa = 0;
    $q5 = "SELECT jumlah FROM $db.$table_jawaban where user_id='$user_id_login_siswa' and
        bidang_layanan in (SELECT id from $db.$table_bidang_layanan)";
    $ex_q5 = mysqli_query($con, $q5);
    while($r5 = mysqli_fetch_assoc($ex_q5)){
        $jumlah_per_siswa += $r5['jumlah'];
    }

    $total_nilai = isset($jumlah_per_siswa) ? $jumlah_per_siswa:0;
    $total_persen = ceil(($total_nilai / (5*($s1+$s2+$s3+$s4))) * 100);
    $data_akhir = array();
    $id_terpilih = array();
    $data = array(0);

    if($total_persen > 50) {
        $exp_id = explode(",",$user_id_login_siswa);
        $exp_total = explode(",",$total_persen);
        $n_idp[] = $exp_id;
        $t_idp[] = $exp_total;
    }else{
        $n_idp[] = array(0);
        $t_idp[] = array(0);
    }

    $data_akhir = array("id" => $n_idp, "value"=>$t_idp);
}

$jum_data = count($data_akhir['id']);
if($jum_data == 0){
    $pesan = " Data tidak tersedia !!!";

}else{
    for($i=0;$i<$jum_data;$i++){
        $id_terpilih[] = $data_akhir['id'][$i];
    }

    foreach($id_terpilih as $key_id){
        $data = $key_id;
        $id[] = implode(",",$data);
    }


}
$user_id = implode(",",$id);
?>
<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <td colspan="4">
                <font size="4"><b>Konseling Individu</b></font>
            </td>
        </tr>
        <tr>
            <td width="10">No</td>
            <td width="350">Nama Siswa</td>
            <td width="100">Tgl Lahir</td>
            <td width="100">Kelas</td>
        </tr>
        <?php
        $no = 1;
        $q = "SELECT nama_lengkap, kelas, DATE_FORMAT(tanggal_lahir,'%d/%m/%Y') AS tanggal_lahir
        FROM $db.$table_siswa where user_id_login IN ($user_id)";
        $ex = mysqli_query($con, $q);
        while($r = mysqli_fetch_assoc($ex)){
            $nama_lengkap_siswa = $r['nama_lengkap'];
            $kelas_siswa = $r['kelas'];
            $tanggal_lahir = $r['tanggal_lahir'];
        ?>
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $nama_lengkap_siswa;?></td>
            <td><?php echo $tanggal_lahir;?></td>
            <td><?php echo $kelas_siswa;?></td>
        </tr>
      <?php } ?>
    </thead>
</table>
<hr width="100%">
