<?php
$table_about = TABLE_ABOUT;
$table_user = TABLE_USER;
$q = "SELECT a.isi, DATE_FORMAT(a.created_date, '%d/%m/%Y') AS created_date, b.nama_lengkap
FROM $db.$table_about AS a
LEFT JOIN $db.$table_user AS b ON a.created_by = b.user_id
WHERE a.status_aktif = '1'
ORDER BY id DESC LIMIT 1";
$ex = mysqli_query($con, $q);
$row = mysqli_fetch_assoc($ex);
$keterangan = isset($row['isi']) ? $row['isi']:"";
$created_by = isset($row['nama_lengkap']) ? $row['nama_lengkap']:"";
$created_date = isset($row['created_date']) ? $row['created_date']:"";
?>
<script src="home/index.js"></script>
<script src="about-us/index.js"></script>
<div id="panel-content">
    <div class="panel panel-default" style="border-radius:0px !important;">
        <div class="panel-heading">
            <p><u>Created By <b><?php echo $created_by;?></b> <span class="glyphicon glyphicon-menu-right"></span> On <b><?php echo $created_date;?></b></u></p>
        </div>
        <div class="panel-body">
            <?php echo $keterangan;?>
        </div>
    </div>
</div>
