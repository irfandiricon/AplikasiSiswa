<script src="content/master_data_siswa/index.js"></script>
<div class="card" style="overflow:scroll">
    <div class="card-body">
        <div class="table table-responsive">
            <table class="display nowrap table table-hover table-striped table-bordered" id="tabel_siswa" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td width="150">NIS</td>
                        <td width="200">Nama Lengkap</td>
                        <td width="200">Tempat & Tgl Lahir</td>
                        <td width="100">JK</td>
                        <td width="150">Sekolah</td>
                        <td width="100">Status</td>
                        <td width="120"></td>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include "../../koneksi_db/Koneksi.php";
                    $table_siswa = TABLE_SISWA;
                    $table_sekolah = TABLE_SEKOLAH;
                    $table_guru = TABLE_GURU;
                    $level = isset($_SESSION['level']) ? $_SESSION['level']:"";
                    $user_id_login = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";
                    if($level==1){
                        $parameter_level = "";
                    }else{
                        $parameter_level = " and c.user_id_login='$user_id_login'";
                    }
                    $query = "SELECT a.user_id_login, a.nis,a.kelas, a.nama_lengkap,CONCAT(a.tempat_lahir,',',DATE_FORMAT(a.tanggal_lahir,'%d/%m/%Y')) AS tgl_lahir,
                    a.jenis_kelamin, IF(a.flag_aktif='Y','Aktif','N. Aktif') AS flag_aktif, b.nama AS nama_sekolah, a.flag_aktif AS status_aktif
                    FROM $db.$table_siswa AS a
                    LEFT JOIN $db.$table_sekolah AS b ON b.id = a.id_sekolah
                    LEFT JOIN $db.$table_guru AS c ON a.id_guru = c.user_id
                    WHERE a.deleted_date IS NULL $parameter_level";

                    $ex_query = mysqli_query($con, $query);
                    while($rows = mysqli_fetch_assoc($ex_query)){
                        $user_id = $rows['user_id_login'];
                        $nis = $rows['nis'];
                        $nama_lengkap = $rows['nama_lengkap'];
                        $tgl_lahir = $rows['tgl_lahir'];
                        $jenis_kelamin = $rows['jenis_kelamin'];
                        $flag_aktif = $rows['flag_aktif'];
                        $nama_sekolah = $rows['nama_sekolah'];
                        $status_aktif = $rows['status_aktif'];
                        $kelas = $rows['kelas'];

                        $onclick_update = "FormUpdateDataSiswa('$user_id','$status_aktif','$kelas')";
                        $onclick_delete = "prosesDeleteDataSiswa('$user_id','$nama_lengkap')";
                    ?>
                    <tr>
                        <td><?php echo $nis;?></td>
                        <td><?php echo $nama_lengkap;?></td>
                        <td><?php echo $tgl_lahir;?></td>
                        <td><?php echo $jenis_kelamin;?></td>
                        <td><?php echo $nama_sekolah;?></td>
                        <td><?php echo $flag_aktif;?></td>
                        <td align="center">
                            <button class="btn btn-info" onclick="<?php echo $onclick_update;?>">
                                <span class="fa fa-edit"></span>
                            </button>&nbsp;
                            <button class="btn btn-danger" onclick="<?php echo $onclick_delete;?>">
                                <span class="fa fa-trash"></span>
                            </button>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
          </div>
        </div>
        </div>
    </div>
</div>
