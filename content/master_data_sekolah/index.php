<script src="content/master_data_sekolah/index.js"></script>

<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-info" onclick="TambahDataSekolah()">
            <span class="fa fa-plus-circle"></span> Tambah Data
        </button>
        <div class="table table-responsive">
            <table class="display nowrap table table-hover table-striped table-bordered" id="example23" cellspacing="0" width="100%">
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
                    $query = "SELECT * FROM $db.$table_sekolah";
                    $ex_query = mysqli_query($con, $query);
                    while($rows = mysqli_fetch_assoc($ex_query)){
                        $nama_sekolah = $rows['nama'];
                        $alamat_sekolah = $rows['alamat'];
                        $no_telpon = $rows['no_telpon'];
                    ?>
                    <tr>
                        <td><?php echo $nama_sekolah;?></td>
                        <td><?php echo $alamat_sekolah;?></td>
                        <td><?php echo $no_telpon;?></td>
                        <td align="center">
                            <button class="btn btn-info"><span class="fa fa-edit"></span></button>&nbsp;
                            <button class="btn btn-danger"><span class="fa fa-trash"></span></button>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
