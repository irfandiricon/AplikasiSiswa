<?php
include "../../../koneksi_db/Koneksi.php";
include "../siswa_profil/master_data_profile.php";

$id_bidang_layanan = isseT($_POST['bidang_layanan']) ? $_POST['bidang_layanan']:"";
$table_pertanyaan = TABLE_PERTANYAAN;
$created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";
$table_jawaban = TABLE_JAWABAN;

$q1 = "SELECT id, pertanyaan FROM $db.$table_pertanyaan WHERE bidang_layanan='$id_bidang_layanan' and kelas IN ('$kelas')";
$ex_q1 = mysqli_query($con, $q1);
$cr = mysqli_num_rows($ex_q1);
if($cr == 0){
?>
<div align="center">
    <font size="5" color="red">
      <b>Data belum tersedia !!!</b>
    </font>
</div>
<?php
}else{
    $q2 = "SELECT COUNT(*) as total FROM $db.$table_jawaban where user_id='$created_by' and bidang_layanan='$id_bidang_layanan'";
    $ex_q2 = mysqli_query($con, $q2);
    $r2 = mysqli_fetch_assoc($ex_q2);
    $total = $r2['total'];
    if($total > 0){
        echo "<div align='center'><font size='5' color='green'>
              <b>Terima kasih telah menjawab <br> Halaman hasil penilaian sedang dalam tahap pengembangan !!!</b></font></div>";
        include "form_hasil.php";
    } else {
?>
    <form id="form_2" name="form_2" method="post">
        <table class="table">
            <tbody>
                <input value="<?php echo $id_bidang_layanan;?>" name="id_bidang_layanan" type="hidden">
                <?php
                for($i=1;$i<=$cr;$i++){
                $r = mysqli_fetch_assoc($ex_q1);
                $pertanyaan = $r['pertanyaan'];
                $id_pertanyaan = $r['id'];
                ?>
                <tr>
                    <td width="10" rowspan="2"><?php echo $i.". ";?></td>
                    <td><b><?php echo $pertanyaan;?></b></td>
                    <td width="5"></td>
                </tr>
                <tr>
                    <td>
                        <input value="<?php echo $id_pertanyaan;?>" id="id_pertanyaan" name="id_pertanyaan[]" type="hidden">
                        <input type="radio" checked name="jawaban[<?php echo $i;?>]" value="1">-------------
                        <input type="radio" name="jawaban[<?php echo $i;?>]" value="2"> -------------
                        <input type="radio" name="jawaban[<?php echo $i;?>]" value="3"> -------------
                        <input type="radio" name="jawaban[<?php echo $i;?>]" value="4"> -------------
                        <input type="radio" name="jawaban[<?php echo $i;?>]" value="5">
                    </td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
                <tr>
                    <td></td>
                    <td>
                        <button class="btn btn-danger" type="button" onclick="FormAwal()">
                            <span class="fa fa-backward"></span> Batal
                        </button> &nbsp;
                        <button class="btn btn-info" type="button" onclick="ProsesPertanyaan()">
                            <span class="fa fa-save"></span> Simpan Data
                        </button>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </form>
<?php
    }
}
?>
