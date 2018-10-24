<script src="content/halaman_hasil/persentase/index.js"></script>
<?php include "../master/master_data_output.php";?>
<div class="card" style="overflow:scroll;height:450px">
    <div class="card-body">
        <button class="btn btn-info" onclick="ExportToWord()">
            <span class="fa fa-download"></span> Export To Word
        </button>
        <hr width="100%">
        <?php
        if($jumlah_siswa==0){
            echo "<div align='center' valign='center'><font size='6' color='red'><b>Maaf, Anda belum memiliki siswa !!!</b></font></div>";
            exit();
        }
        ?>
        <div class="table table-responsive table-bordered table-striped" style="overflow:scroll">
            <table width="2000" id="tabel_hasil" name="tabel_hasil" style="padding-bottom:20px">
                <thead>
                    <tr align="center">
                        <th width="15" rowspan="2">No</th>
                        <th width="250" rowspan="2">Nama Siswa</th>
                        <th width="200" rowspan="2">Jenis Kelamin</th>
                        <?php
                        foreach($data_bidang_layanan as $bidang_layanan){
                            $deskripsi_bidang_layanan = $bidang_layanan['deskripsi_bidang_layanan'];
                            $id_bidang_layanan = $bidang_layanan['id_bidang_layanan'];
                            $q2 = "SELECT COUNT(*) as total_pertanyaan FROM $db.$table_pertanyaan
                                WHERE bidang_layanan='$id_bidang_layanan'";
                            $ex_q2 = mysqli_query($con, $q2);
                            while($r2 = mysqli_fetch_array($ex_q2)){
                            $total_soal_perbidang = $r2['total_pertanyaan'];
                            $jumlah_soal_perbidang[] = $r2['total_pertanyaan'];
                            ?>
                            <th colspan="<?php echo $total_soal_perbidang ;?>"><?php echo $deskripsi_bidang_layanan;?></th>
                        <?php
                            }
                        }
                        $jumlah_soal_perbidang = implode(",",$jumlah_soal_perbidang);
                        ?>
                        <th width="100" rowspan="2">Persentase</th>
                        <th width="100" rowspan="2">Action</th>
                        <th width="5" rowspan="2"></th>
                    </tr>
                    <?php
                    list($s1,$s2,$s3,$s4) = explode(",",$jumlah_soal_perbidang);
                    ?>
                    <tr align="center">
                        <?php
                            for($i=1;$i<=$s1;$i++){
                        ?>
                            <td width="50"><?php echo $i;?></td>
                        <?php
                            }
                        ?>
                        <?php
                            for($i=1;$i<=$s2;$i++){
                        ?>
                            <td width="50"><?php echo $i;?></td>
                        <?php
                            }
                        ?>
                        <?php
                            for($i=1;$i<=$s3;$i++){
                        ?>
                            <td width="50"><?php echo $i;?></td>
                        <?php
                            }
                        ?>
                        <?php
                            for($i=1;$i<=$s4;$i++){
                        ?>
                            <td width="50"><?php echo $i;?></td>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
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
                    ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $nama_siswa;?></td>
                        <td><?php echo $jenis_kelamin_siswa;?></td>
                        <?php
                            for($j=0;$j<$s1;$j++){
                            $h1 = isset($exp_dj_1[$j]) ? $exp_dj_1[$j]:"";
                        ?>
                            <td><?php echo ($h1);?></td>
                        <?php
                            }
                        ?>
                        <?php
                            for($j=0;$j<$s2;$j++){
                            $h2 = isset($exp_dj_2[$j]) ? $exp_dj_2[$j]:"";
                        ?>
                            <td><?php echo ($h2);?></td>
                        <?php
                            }
                        ?>
                        <?php
                            for($j=0;$j<$s3;$j++){
                            $h3 = isset($exp_dj_3[$j]) ? $exp_dj_3[$j]:"";
                        ?>
                            <td><?php echo ($h3);?></td>
                        <?php
                            }
                        ?>
                        <?php
                            for($j=0;$j<$s4;$j++){
                            $h4 = isset($exp_dj_4[$j]) ? $exp_dj_4[$j]:"";
                        ?>
                            <td><?php echo ($h4);?></td>
                        <?php
                            }
                        ?>
                        <?php
                        $jumlah_per_siswa = 0;
                        $q5 = "SELECT jumlah FROM $db.$table_jawaban where user_id='$user_id_login_siswa' and
                            bidang_layanan in (SELECT id from $db.$table_bidang_layanan)";
                        $ex_q5 = mysqli_query($con, $q5);
                        while($r5 = mysqli_fetch_assoc($ex_q5)){
                            $jumlah_per_siswa += $r5['jumlah'];
                        }

                        $total_nilai = isset($jumlah_per_siswa) ? $jumlah_per_siswa:0;
                        $total_persen = ceil(($total_nilai / (5*($s1+$s2+$s3+$s4))) * 100);
                        ?>
                        <td>
                            <?php echo number_format($total_persen,2)." %";?>
                        </td>
                        <td>
                            <button class="btn btn-danger" type="button" onclick="ResetDataJawaban('<?php echo $user_id_login_siswa;?>','<?php echo $nama_siswa;?>')">
                                <span class="fa fa-trash"></span> Reset Data
                            </button>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Persentase Per Butir ( % )</td>
                        <?php
                            for($j=0;$j<$s1;$j++){
                                $q6_1 = "SELECT b.user_id AS user_id_siswa,b.nama_lengkap AS nama_lengkap_siswa, a.bidang_layanan, a.id_pertanyaan, a.jawaban
                                    FROM $db.$table_jawaban AS a
                                    LEFT JOIN $db.$table_siswa AS b ON b.user_id_login = a.user_id
                                    LEFT JOIN $db.$table_guru AS c ON b.id_guru = c.user_id
                                    WHERE a.bidang_layanan = 1 and b.flag_aktif='Y' and c.user_id_login='$created_by'";
                                $ex_q6_1 = mysqli_query($con, $q6_1);
                                $jum_q6_1 = mysqli_num_rows($ex_q6_1);
                                $dr_1=0;
                                //echo $q6_1."<br>";
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
                                $arr_dr_1[] = $persentase_dr_1;
                        ?>
                                <td><?php echo (ceil($persentase_dr_1));?></td>
                        <?php
                            }
                        ?>

                        <?php
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
                                $arr_dr_2[] = $persentase_dr_2;
                        ?>
                                <td><?php echo (ceil($persentase_dr_2));?></td>
                        <?php
                            }
                        ?>

                        <?php
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
                                $arr_dr_3[] = $persentase_dr_3;
                        ?>
                                <td><?php echo (ceil($persentase_dr_3));?></td>
                        <?php
                            }
                        ?>

                        <?php
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
                                $arr_dr_4[] = $persentase_dr_4;
                        ?>
                                <td><?php echo (ceil($persentase_dr_4));?></td>
                        <?php
                            }
                        ?>
                        <td></td>
                    </tr>
                    <?php
                    $avr_persentase_dr_1 = array_sum($arr_dr_1) / count($arr_dr_1) ;
                    $avr_persentase_dr_2 = array_sum($arr_dr_2) / count($arr_dr_2) ;
                    $avr_persentase_dr_3 = array_sum($arr_dr_3) / count($arr_dr_3) ;
                    $avr_persentase_dr_4 = array_sum($arr_dr_4) / count($arr_dr_4) ;
                    ?>
                    <tr align="center">
                        <td colspan="3" align="left">Persentase Per Bidang ( % )</td>
                        <td colspan="<?php echo $s1;?>"><?php echo number_format($avr_persentase_dr_1,2);?></td>
                        <td colspan="<?php echo $s2;?>"><?php echo number_format($avr_persentase_dr_2,2);?></td>
                        <td colspan="<?php echo $s3;?>"><?php echo number_format($avr_persentase_dr_3,2);?></td>
                        <td colspan="<?php echo $s4;?>"><?php echo number_format($avr_persentase_dr_4,2);?></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
