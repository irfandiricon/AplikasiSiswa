<script src="content/download/index.js"></script>
<div class="card" style="overflow:scroll">
    <div class="card-body">
        <button type="button" class="btn btn-info" onclick="FormTambah()">
            <span class="fa fa-plus-circle"></span> Tambah Data
        </button><hr width="100%">
        <div class="table table-responsive">
            <table class="display nowrap table table-hover table-striped table-bordered" id="tabel_download" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Nama File</td>
                        <td width="200">File Download</td>
                        <td width="50"></td>
                        <td width="5"></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../../koneksi_db/Koneksi.php";
                    $table_download = TABLE_DOWNLOAD;
                    $file_location = FILE_LOCATION;
                    $lampiran = "path_file";
                    $file = "CONCAT('<a href=file_upload/',".$lampiran.",' target=__blank>',' &nbsp;(Download) </a>') as path_file";
                    $query = "SELECT id,nama_file,$file FROM $db.$table_download ";
                    $ex_query = mysqli_query($con, $query);
                    while($rows = mysqli_fetch_assoc($ex_query)){
                        $id = $rows['id'];
                        $nama_file= $rows['nama_file'];
                        $path_file = $rows['path_file'];
                        $data = json_encode(array("id" => $id, "nama" => $nama_file, "path_file" => $path_file));
                    ?>
                    <tr>
                        <td><?php echo $nama_file;?></td>
                        <td><?php echo $path_file;?></td>
                        <td align="center">
                            <button class="btn btn-danger" onclick='<?php echo "prosesDelete($data)";?>'><span class="fa fa-trash"></span></button>
                        </td>
                        <td></td>
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
