<?php
include "../../../koneksi_db/Koneksi.php";
include "../siswa_profil/master_data_profile.php";
$table_pertanyaan = TABLE_PERTANYAAN;
$table_bidang_layanan = TABLE_BIDANG_LAYANAN;
?>
<script src="content/halaman_siswa/siswa_angket/index.js"></script>
<div class="card" style="overflow:scroll">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <font size="4">Daftar Pernyataan</font>
            </div>
        </div>
        <hr width="100%">
        <div class="row">
            <div class="col-md-12" align="center">
                <?php
                $q1 = "SELECT a.bidang_layanan as id_bidang_layanan, b.deskripsi AS bidang_layanan
                    FROM $db.$table_pertanyaan AS a
                    LEFT JOIN $db.$table_bidang_layanan AS b ON a.bidang_layanan = b.id
                    GROUP BY a.bidang_layanan";
                $ex_q1 = mysqli_query($con, $q1);
                while($r1 = mysqli_fetch_assoc($ex_q1)){
                $bidang_layanan = $r1['bidang_layanan'];
                $id_bidang_layanan = $r1['id_bidang_layanan'];
                $onclick = "FormPertanyaan('$id_bidang_layanan','$bidang_layanan')";
                ?>
                <button class="btn btn-info btn-lg" type="button" onclick="<?php echo $onclick;?>">
                    <span class="fa fa-book"></span> &nbsp;<?php echo $bidang_layanan;?>
                </button>
                &nbsp;
                <?php
                }
                ?>
            </div>
        </div>
        <hr align="center" width="100%">
        <div class="row">
            <div class="col-md-12">
                <div id="header_pertanyaan"></div>
                <div id="detail_pertanyaan"></div>
                <div id="jawaban"></div>
            </div>
        </div>
    </div>
</div>
