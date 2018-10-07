<?php
include "../../koneksi_db/Koneksi.php";
$table_support = TABLE_SUPPORT;
$query = "SELECT * FROM $db.$table_support AS a";
$ex_query = mysqli_query($con, $query);
$rows = mysqli_fetch_assoc($ex_query);
$isi = stripslashes($rows['isi']);

?>
<script src="content/support/index.js"></script>
<div class="card" style="overflow:scroll">
    <div class="card-body">
        <form method="post" name="form_1" id="form_1" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <div id="isi" name="isi" style="width:'100%'"></div>
            </div>
        </div>
        <hr width="100%">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-info" type="button" onclick="SimpanSupport()">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>

<script>
$(function(){
    var isi = '<?php echo $isi?>';
    $('#isi').texteditor({
        height : 300,
        id : 'isi'
    });
    $('#isi').texteditor('setValue', isi);
});
</script>
