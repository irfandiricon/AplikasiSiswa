<script src="content/message/index.js"></script>
<div class="card" style="overflow:scroll">
    <div class="card-body">
        <div class="table table-responsive">
            <table class="display nowrap table table-hover table-striped table-bordered" id="tabel_pesan" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td width="5"></td>
                        <td width="150">Email</td>
                        <td width="150">No. Telpon / HP</td>
                        <td width="200">Nama Lengkap</td>
                        <td width="200">Subjek</td>
                        <td width="150">Tanggal Masuk</td>
                        <td width="120"></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../../koneksi_db/Koneksi.php";
                    $table_pesan = TABLE_PESAN;
                    $query = "SELECT id, email, no_telp, nama_lengkap, subjek, pesan, is_read,
                    DATE_FORMAT(created_date, '%d/%m/%Y %h:%i') as tanggal_masuk
                    FROM $db.$table_pesan WHERE is_delete = '0' ORDER BY id desc";
                    $ex_query = mysqli_query($con, $query);
                    while($rows = mysqli_fetch_assoc($ex_query)){
                        $id = $rows['id'];
                        $email = $rows['email'];
                        $no_telp = $rows['no_telp'];
                        $nama_lengkap = $rows['nama_lengkap'];
                        $subjek = $rows['subjek'];
                        $pesan = $rows['pesan'];
                        $is_read = $rows['is_read'];
                        $tanggal_masuk = $rows['tanggal_masuk'];
                        if($is_read=="0"){
                            $style_read = "style='font-weight:bold;font-style: italic;'";
                        }else{
                            $style_read = "";
                        }
                    ?>

                    <tr <?php echo $style_read;?>>
                        <td></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $no_telp;?></td>
                        <td><?php echo $nama_lengkap;?></td>
                        <td><?php echo $subjek;?></td>
                        <td><?php echo $tanggal_masuk;?></td>
                        <td align="center">
                            <button class="btn btn-info" onclick="FormView('<?php echo ($id);?>','<?php echo ($subjek);?>','<?php echo ($pesan);?>')">
                                <span class="fa fa-edit"></span>
                            </button>&nbsp;
                            <button class="btn btn-danger" onclick="prosesDelete('<?php echo ($id);?>','<?php echo ($subjek);?>')">
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
