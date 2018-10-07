<script src="content/home/index.js"></script>
<div class="card" style="overflow:scroll">
    <div class="card-body">
        <button type="button" class="btn btn-info" onclick="FormAdd()">
            <span class="fa fa-plus-circle"></span> Tambah Data
        </button><hr width="100%">
        <div class="table table-responsive">
            <table class="display nowrap table table-hover table-striped table-bordered" id="tabel_berita" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Judul Berita</td>
                        <td width="150">Created By</td>
                        <td width="150">Status</td>
                        <td width="120"></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../../koneksi_db/Koneksi.php";
                    $table_home = TABLE_HOME;
                    $table_user = TABLE_USER;
                    $query = "SELECT a.id, a.judul, a.isi, DATE_FORMAT(a.created_date, '%d-%m-%Y') AS created_date,
                        b.nama_lengkap,
                        IF(a.status_aktif='1','Aktif','Non Aktif') AS status_aktif, a.status_aktif AS status_berita
                        FROM $db.$table_home AS a
                        LEFT JOIN $db.$table_user AS b ON a.created_by = b.user_id";
                    $ex_query = mysqli_query($con, $query);
                    while($rows = mysqli_fetch_assoc($ex_query)){
                        $id = $rows['id'];
                        $judul = $rows['judul'];
                        $isi = $rows['isi'];
                        $status_aktif = $rows['status_aktif'];
                        $status = $rows['status_berita'];
                        $nama_lengkap = $rows['nama_lengkap'];
                        $data = json_encode(array("id" => $id, "judul" => $judul, "isi" => $isi, "status_aktif" => $status));
                    ?>
                    <tr>
                        <td><?php echo $judul;?></td>
                        <td><?php echo $nama_lengkap;?></td>
                        <td><?php echo $status_aktif;?></td>
                        <td align="center">
                            <button class="btn btn-info" onclick='<?php echo "FormUpdate($data)";?>'>
                                <span class="fa fa-edit"></span>
                            </button>&nbsp;
                            <button class="btn btn-danger" onclick='<?php echo "prosesDeleteData($data)";?>'><span class="fa fa-trash"></span></button>
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
