<?php include "../master/master_data_output.php";?>
<script src="content/halaman_hasil/perbandingan/index.js"></script>
<div class="card" style="overflow:scroll;height:450px">
    <div class="card-body">
        <button class="btn btn-info" onclick="GetTable1()">Tabel Bimbingan Klasikal</button> &nbsp;
        <button class="btn btn-info" onclick="GetTable2()">Tabel Bimbingan Kelompok</button> &nbsp;
        <button class="btn btn-info" onclick="GetTable3()">Tabel Konseling Kelompok</button> &nbsp;
        <button class="btn btn-info" onclick="GetTable4()">Tabel Konseling Individu</button> &nbsp;
        <hr width="100%">
        <div id="DataTable"></div>
    </div>
</div>
