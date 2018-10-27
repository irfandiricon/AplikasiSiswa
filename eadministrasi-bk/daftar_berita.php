<?php
error_reporting(E_WARNING || E_NOTICE);
include "../koneksi_db/Koneksi.php";
$table_home = TABLE_HOME;
$table_user = TABLE_USER;
$q = "SELECT a.id, a.judul, a.isi, DATE_FORMAT(a.created_date, '%d/%m/%Y') AS created_date, b.nama_lengkap
FROM $db.$table_home AS a
LEFT JOIN $db.$table_user AS b ON a.created_by = b.user_id
WHERE a.status_aktif = '1'
ORDER BY id DESC LIMIT 5";
$ex = mysqli_query($con, $q);
?>
<div class="panel panel-default panel-heading" style="border-radius:0px !important;">
    <?php
    while($row = mysqli_fetch_assoc($ex)){
    $id = isset($row['id']) ? $row['id']:"";
    $judul = isset($row['judul']) ? $row['judul']:"";
    $keterangan = isset($row['isi']) ? $row['isi']:"";
    $created_by = isset($row['nama_lengkap']) ? $row['nama_lengkap']:"";
    $created_date = isset($row['created_date']) ? $row['created_date']:"";

    ?>
        <p><h3 class="panel-title"><?php echo $judul;?></h3></p>
        <p><a href="javascript:void(0)" onclick="DetailNews('<?php echo $id;?>')">
          Selengkapnya <span class="glyphicon glyphicon-chevron-right"></span>
        </a></p>
        <hr width="100%">
    <?php } ?>
    <a href="javascript:void(0)" onclick="SeeMoreNews()">Tampilkan Lebih Banyak</a>
</div>
