<?php
include "../../../koneksi_db/Koneksi.php";
$table_guru = TABLE_GURU;
$id_sekolah = isset($_POST['id_sekolah']) ? $_POST['id_sekolah']:"";
$q = "SELECT user_id, IF(nip IS NULL OR nip='',0,nip) as nip, UPPER(nama_lengkap) as nama_lengkap from $db.$table_guru WHERE id_sekolah = '$id_sekolah'";
$ex_q = mysqli_query($con, $q);
?>
<select class="form-control" id="nama_guru" name="nama_guru">
    <option value="">PILIH DATA</option>
    <?php
    while($r=mysqli_fetch_assoc($ex_q)){
    $user_id = $r['user_id'];
    $nama_lengkap = $r['nama_lengkap'];
    $nip = $r['nip'];
    ?>
    <option value="<?php echo $user_id?>"><?php echo $nip." - ".$nama_lengkap;?></option>
    <?php
    }
    ?>
</select>
