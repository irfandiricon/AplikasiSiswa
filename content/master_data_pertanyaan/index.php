<?php
include "../../koneksi_db/Koneksi.php";
$table_pertanyaan = TABLE_PERTANYAAN;
$table_bidang_layanan = TABLE_BIDANG_LAYANAN;
?>
<script src="content/master_data_pertanyaan/index.js"></script>
<div class="card" style="overflow:scroll">
    <div class="card-body">
        <button type="button" class="btn btn-info" onclick="FormAddDataPertanyaan()">
            <span class="fa fa-plus-circle"></span> Tambah Data
        </button>
        <hr width="100%">
        <div class="table table-responsive">
            <table class="display nowrap table table-hover table-striped table-bordered" id="tabel_pertanyaan" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td width="150">Bidang Layanan</td>
                        <td width="250">Pernyataan</td>
                        <td width="250">Tujuan Layanan</td>
                        <td width="100"></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q1 = "SELECT a.id, a.pertanyaan, a.tujuan_layanan, b.deskripsi FROM $db.$table_pertanyaan AS a
                        LEFT JOIN $db.$table_bidang_layanan AS b ON a.bidang_layanan = b.id
                        ORDER BY b.id, a.id";
                    $ex_q1 = mysqli_query($con, $q1);
                    while($r1 = mysqli_fetch_assoc($ex_q1)){
                        $pertanyaan = $r1['pertanyaan'];
                        $tujuan_layanan = $r1['tujuan_layanan'];
                        $deskripsi = $r1['deskripsi'];
                        $id = $r1['id'];
                    ?>
                    <tr>
                        <td><?php echo $deskripsi;?></td>
                        <td><?php echo $pertanyaan;?></td>
                        <td><?php echo $tujuan_layanan;?></td>
                        <td>
                            <button class="btn btn-info" id="btn-update" onclick="UpdatePertanyaan('<?php echo ($id);?>')">
                                <span class="fa fa-edit"></span>
                            </button> &nbsp;&nbsp;
                            <button class="btn btn-danger" onclick="DeletePertanyaan('<?php echo $id;?>','<?php echo $pertanyaan;?>')">
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
