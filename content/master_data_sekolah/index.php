<script src="content/master_data_sekolah/index.js"></script>
<div class="card" style="overflow:scroll">
    <div class="card-body">
        <button type="button" class="btn btn-info" onclick="FormAddDataSekolah()">
            <span class="fa fa-plus-circle"></span> Tambah Data
        </button>
        <div class="table table-responsive">
            <table class="display nowrap table table-hover table-striped table-bordered" id="tabel_sekolah" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td width="200">Nama Sekolah</td>
                        <td>Alamat Sekolah</td>
                        <td width="250">No. Telepon Sekolah</td>
                        <td width="120"></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../../koneksi_db/Koneksi.php";
                    $table_sekolah = TABLE_SEKOLAH;
                    $query = "SELECT * FROM $db.$table_sekolah WHERE flag_aktif='Y'";
                    $ex_query = mysqli_query($con, $query);
                    while($rows = mysqli_fetch_assoc($ex_query)){
                        $id = $rows['id'];
                        $nama_sekolah = $rows['nama'];
                        $alamat_sekolah = $rows['alamat'];
                        $no_telpon = $rows['no_telpon'];
                        $data = json_encode(array("id" => $id, "nama" => $nama_sekolah, "alamat" => $alamat_sekolah, "no_telepon" => $no_telpon));
                    ?>
                    <tr>
                        <td><?php echo $nama_sekolah;?></td>
                        <td><?php echo $alamat_sekolah;?></td>
                        <td><?php echo $no_telpon;?></td>
                        <td align="center">
                            <button class="btn btn-info" onclick='<?php echo "FormUpdateDataSekolah($data)";?>'>
                                <span class="fa fa-edit"></span>
                            </button>&nbsp;
                            <button class="btn btn-danger" onclick='<?php echo "prosesDeleteDataSekolah($data)";?>'><span class="fa fa-trash"></span></button>
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
