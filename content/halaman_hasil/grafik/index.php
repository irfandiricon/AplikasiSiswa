<?php include "../master/master_data_output.php";?>
<div class="card" style="overflow:scroll;height:450px">
    <div class="card-body">
        <?php
        if($jumlah_siswa==0){
            echo "<div align='center' valign='center'><font size='6' color='red'><b>Maaf, Anda belum memiliki siswa !!!</b></font></div>";
            exit();
        }
        foreach($data_bidang_layanan as $bidang_layanan){
            $deskripsi_bidang_layanan = $bidang_layanan['deskripsi_bidang_layanan'];
            $id_bidang_layanan = $bidang_layanan['id_bidang_layanan'];

            $q2 = "SELECT COUNT(*) as total_pertanyaan FROM $db.$table_pertanyaan
                WHERE bidang_layanan='$id_bidang_layanan' ";
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

            $qq1 = "SELECT id, jawaban, jumlah, persentase FROM $db.$table_jawaban
                WHERE user_id='$user_id_login_siswa' and bidang_layanan=1";
            $ex_qq1 = mysqli_query($con, $qq1);
            $res_qq1 = mysqli_fetch_assoc($ex_qq1);
            $id_jawaban = $res_qq1['id'];
            $jawaban_1 = $res_qq1['jawaban'];
            $exp_dj_1 = explode(",",$jawaban_1);
            $dj_1 = array($exp_dj_1);

            $qq2 = "SELECT jawaban, jumlah, persentase FROM $db.$table_jawaban
                WHERE user_id='$user_id_login_siswa' and bidang_layanan=2";
            $ex_qq2 = mysqli_query($con, $qq2);
            $res_qq2 = mysqli_fetch_assoc($ex_qq2);
            $jawaban_2 = $res_qq2['jawaban'];
            $exp_dj_2 = explode(",",$jawaban_2);
            $dj_2 = array($exp_dj_2);

            $qq3 = "SELECT jawaban, jumlah, persentase FROM $db.$table_jawaban
                WHERE user_id='$user_id_login_siswa' and bidang_layanan=3";
            $ex_qq3 = mysqli_query($con, $qq3);
            $res_qq3 = mysqli_fetch_assoc($ex_qq3);
            $jawaban_3 = $res_qq3['jawaban'];
            $exp_dj_3 = explode(",",$jawaban_3);
            $dj_3 = array($exp_dj_3);

            $qq4 = "SELECT jawaban, jumlah, persentase FROM $db.$table_jawaban
                WHERE user_id='$user_id_login_siswa' and bidang_layanan=4";
            $ex_qq4 = mysqli_query($con, $qq4);
            $res_qq4 = mysqli_fetch_assoc($ex_qq4);
            $jawaban_4 = $res_qq4['jawaban'];
            $exp_dj_4 = explode(",",$jawaban_4);
            $dj_4 = array($exp_dj_4);
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
            $persentase_dr_1 = ($dr_1 / (5*$jumlah_siswa)) * 100;
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
            $persentase_dr_2 = ($dr_2 / (5*$jumlah_siswa)) * 100;
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
            $persentase_dr_3 = ($dr_3 / (5*$jumlah_siswa)) * 100;
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
            $persentase_dr_4 = ($dr_4 / (5*$jumlah_siswa)) * 100;
            $dp_4[] = $persentase_dr_4;
            $arr_dr_4[] = $persentase_dr_4;
        }

        $avr_persentase_dr_1 = array_sum($arr_dr_1) / count($arr_dr_1) ;
        $avr_persentase_dr_2 = array_sum($arr_dr_2) / count($arr_dr_2) ;
        $avr_persentase_dr_3 = array_sum($arr_dr_3) / count($arr_dr_3) ;
        $avr_persentase_dr_4 = array_sum($arr_dr_4) / count($arr_dr_4) ;

        $data_per_bidang = array($avr_persentase_dr_1, $avr_persentase_dr_2, $avr_persentase_dr_3, $avr_persentase_dr_4);
        $total_soal = $s1+$s2+$s3+$s4;

        $merge_per_butir = array_merge($dp_1,$dp_2,$dp_3,$dp_4);

        ?>
        <canvas id="persentase_per_bidang" width="100%" height="30%"></canvas>
        <hr width="100%">
        <canvas id="persentase_per_butir" width="100%" height="30%"></canvas>
    </div>
</div>
<script>
var ctx = document.getElementById("persentase_per_bidang").getContext('2d');
var data_per_bidang = [<?php echo $avr_persentase_dr_1;?>,<?php echo $avr_persentase_dr_2;?>,<?php echo $avr_persentase_dr_3;?>,<?php echo $avr_persentase_dr_4;?>];
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Pribadi", "Sosial", "Belajar", "Karier"],
        datasets: [{
            label: '# Persentase Per Bidang',
            data: data_per_bidang,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
           yAxes: [{
               ticks: {
                   min: 0,
                   max: 100,
                   callback: function(value) {
                       return value + "%"
                   }
               },
               scaleLabel: {
                   display: true,
                   labelString: "Percentage"
               }
           }]
        }
    }
});

var ctx2 = document.getElementById("persentase_per_butir").getContext('2d');
var count = "<?php echo $total_soal?>";
var data = new Array();
for(var i=0;i<count;i++){
    data[i] = i+1;
}
var hasil = data.join(",");
var merge_per_butir = <?php echo json_encode($merge_per_butir)?>;
var myChart = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: data,
        datasets: [{
            label: '# Persentase Per Butir',
            data: merge_per_butir,
            borderWidth: 2
        }]
    },
    options: {
        scales: {
           yAxes: [{
               ticks: {
                   min: 0,
                   max: 100,
                   callback: function(value) {
                       return value + "%"
                   }
               },
               scaleLabel: {
                   display: true,
                   labelString: "Percentage"
               }
           }]
        }
    }
});
</script>
