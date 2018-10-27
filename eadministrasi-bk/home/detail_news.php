<?php
//error_reporting(E_WARNING || E_NOTICE);
include "../../koneksi_db/Koneksi.php";
$table_home = TABLE_HOME;
$table_user = TABLE_USER;
$id = isset($_POST['id']) ? $_POST['id']:"";
$q = "SELECT a.judul, a.isi, DATE_FORMAT(a.created_date, '%d/%m/%Y') AS created_date, b.nama_lengkap
FROM $db.$table_home AS a
LEFT JOIN $db.$table_user AS b ON a.created_by = b.user_id
WHERE a.status_aktif = '1' and id='$id'";
$ex = mysqli_query($con, $q);
$row = mysqli_fetch_assoc($ex);
$judul = isset($row['judul']) ? $row['judul']:"";
$keterangan = isset($row['isi']) ? $row['isi']:"";
$created_by = isset($row['nama_lengkap']) ? $row['nama_lengkap']:"";
$created_date = isset($row['created_date']) ? $row['created_date']:"";
?>
<script src="home/index.js"></script>
<div class="panel panel-default" style="border-radius:0px !important;">
    <div class="panel-heading">
        <h3 class="panel-title">
            <font size="4"><u><b><?php echo $judul;?></b><u></font>
        </h3>
        <p><u>Created By <b><?php echo $created_by;?></b> <span class="glyphicon glyphicon-menu-right"></span> On <b><?php echo $created_date;?></b></u></p>
    </div>
    <div class="panel-body">
        <?php echo $keterangan;?>
    </div>
</div>
