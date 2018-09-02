<script src="content/halaman_siswa/siswa_profil/index.js"></script>
<?php include "master_data_profile.php";?>
<div class="card" style="overflow:scroll">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <font size="4">Data Diri</font>
                <hr width="100%">
                <?php require_once "tabel_data_diri.php";?>
            </div>
            <div class="col-md-6">
                <font size="4">Data Sekolah</font>
                <hr width="100%">
                <?php require_once "tabel_data_sekolah.php";?>
            </div>
        </div>
        <hr width="100%">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-info btn-lg" type="button" onclick="FormUpdateData()">
                    <span class="fa fa-edit"></span> Update Data
                </button>
            </div>
        </div>
    </div>
</div>
