<?php
include "../koneksi_db/Koneksi.php";
$table_sekolah = TABLE_SEKOLAH;
?>
<select name="sekolah" id="sekolah">
    <option value="">PILIH DATA</option>
<?php
$q = "SELECT id, nama FROM $db.$table_sekolah";
$ex = mysqli_query($con, $q);
while($r = mysqli_fetch_assoc($ex)){
    $id = $r['id'];
    $nama = $r['nama'];
    echo "<option value='$id'>$nama</option>";
}
?>
</select>
