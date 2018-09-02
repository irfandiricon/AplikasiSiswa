<?php
include "../../koneksi_db/Koneksi.php";
$table_bidang_layanan = TABLE_BIDANG_LAYANAN;
$table_komponen_layanan = TABLE_KOMPONEN_LAYANAN;
$table_strategi_layanan = TABLE_STRATEGI_LAYANAN;
$table_metode_layanan = TABLE_METODE_LAYANAN;
$table_media_layanan = TABLE_MEDIA_LAYANAN;
$table_pertanyaan = TABLE_PERTANYAAN;

$id = isset($_GET['id']) ? $_GET['id']:"";
if(!empty($id) || $id != "" || $id != "null"){
		$q = "SELECT * FROM $db.$table_pertanyaan where id='$id'";
		$ex_q = mysqli_query($con, $q);
		$r = mysqli_fetch_assoc($ex_q);
		$pertanyaan = $r['pertanyaan'];
		$rumusan_kebutuhan = $r['rumusan_kebutuhan'];
		$rumusan_tujuan = $r['rumusan_tujuan'];
		$tujuan_layanan = $r['tujuan_layanan'];
		$materi_layanan = $r['materi_layanan'];
		$metode_layanan = isset($r['metode_layanan']) ? $r['metode_layanan']:"0";
		$media_layanan = isset($r['media_layanan']) ? $r['media_layanan']:"0";
		$bidang_layanan = $r['bidang_layanan'];
		$komponen_layanan = $r['komponen_layanan'];
		$strategi_layanan = $r['strategi_layanan'];

		$q2 = "SELECT GROUP_CONCAT(deskripsi) as deskripsi_metode_layanan FROM $db.$table_metode_layanan WHERE id IN ($metode_layanan)";
		$ex_q2 = mysqli_query($con, $q2);
		$r2 = mysqli_fetch_assoc($ex_q2);
		$deskripsi_metode_layanan = $r2['deskripsi_metode_layanan'];

		$q3 = "SELECT GROUP_CONCAT(deskripsi) as deskripsi_media_layanan FROM $db.$table_media_layanan WHERE id IN ($media_layanan)";
		$ex_q3 = mysqli_query($con, $q3);
		$r3 = mysqli_fetch_assoc($ex_q3);
		$deskripsi_media_layanan = $r3['deskripsi_media_layanan'];
}
?>

<form method="post" action="javascript:void(0)" name="form_1" id="form_1">
<div class="panel panel-default panel-heading">
		<button class="btn btn-info" type="button" onclick="FormAwal()">
				<span class="fa fa-backward"></span> Batal
		</button>
		<?php if(!empty($id)){ ?>
		<button class="btn btn-info" type="button" id="btn_update" onclick="ProsesUpdateDataPertanyaan()">
				<span class="fa fa-save"></span> Update Data
		</button>
		<?php } else { ?>
		<button class="btn btn-info" type="button" id="btn_simpan" onclick="SimpanDataPertanyaan()">
				<span class="fa fa-save"></span> Simpan Data
		</button>
		<?php } ?>
		&nbsp;
		<span id="pesan"></span>
		<div class="row">
				<div class="col-md-6">
						<table class="table">
								<tbody>
										<tr>
												<td width="150">Pertanyaan</td>
												<td>
														<input id="id" name="id" value="<?php echo $id;?>" type="hidden">
														<textarea required rows="2" placeholder="Masukan Pertanyaan" name="pertanyaan"
																id="pertanyaan"><?php echo $pertanyaan;?></textarea>
												</td>
										</tr>
										<tr>
												<td>Rumusan Kebutuhan</td>
												<td>
														<textarea required rows="2" placeholder="Masukan Rumusan" name="rumusan_kebutuhan"
																id="rumusan_kebutuhan"><?php echo $rumusan_kebutuhan;?></textarea>
												</td>
										</tr>
										<tr>
												<td>Bidang Layanan</td>
												<td>
														<select class="form-control" name="bidang_layanan" id="bidang_layanan">
																<option value="">Pilih Data</option>
																<?php
																$q1 = "SELECT id, deskripsi FROM $db.$table_bidang_layanan";
																$ex_q1 = mysqli_query($con, $q1);
																while($r1 = mysqli_fetch_assoc($ex_q1)){
																		$id = $r1['id'];
																		$deskripsi = $r1['deskripsi'];
																?>
																		<option value='<?php echo $id;?>' <?php if($id==$bidang_layanan) { echo "selected";} ?>><?php echo $deskripsi;?></option>
																<?php
																}
																?>
														</select>
												</td>
										</tr>
										<tr>
												<td width="150">Strategi Layanan</td>
												<td>
														<select class="form-control" name="strategi_layanan" id="strategi_layanan">
																<option value="">Pilih Data</option>
																<?php
																$q1 = "SELECT id, deskripsi FROM $db.$table_strategi_layanan";
																$ex_q1 = mysqli_query($con, $q1);
																while($r1 = mysqli_fetch_assoc($ex_q1)){
																		$id = $r1['id'];
																		$deskripsi = $r1['deskripsi'];
																?>
																		<option value='<?php echo $id;?>' <?php if($id==$strategi_layanan) { echo "selected";} ?>><?php echo $deskripsi;?></option>
																<?php
																}
																?>
														</select>
												</td>
										</tr>
										<tr>
												<td>Materi Layanan</td>
												<td>
														<textarea required rows="2" placeholder="Masukan Materi" name="materi_layanan"
																id="materi_layanan"><?php echo $materi_layanan;?></textarea>
												</td>
										</tr>
										<tr>
												<td>Media Layanan</td>
												<td>
														<button type="button" class="btn btn-info" onclick="getDataMediaLayanan()">
																<span class="fa fa-plus-circle"></span> Pilih Media Layanan
														</button>
														<textarea id="deskripsi_media" rows="2" style="margin-top:10px"
																readonly><?php echo $deskripsi_media_layanan;?></textarea>
														<input id="id_media_layanan" value="<?php echo $media_layanan;?>" name="id_media_layanan" type="hidden">
												</td>
												<td></td>
										</tr>
								</tbody>
						</table>
				</div>
				<div class="col-md-6">
						<table class="table">
								<tbody>
										<tr>
												<td>Rumusan Tujuan</td>
												<td>
														<textarea required rows="2" placeholder="Masukan Rumusan" name="rumusan_tujuan"
																id="rumusan_tujuan"><?php echo $rumusan_tujuan;?></textarea>
												</td>
										</tr>
										<tr>
												<td>Tujuan Layanan</td>
												<td>
														<textarea required rows="2" placeholder="Masukan Tujuan" name="tujuan_layanan"
																id="tujuan_layanan"><?php echo $tujuan_layanan;?></textarea>
												</td>
										</tr>
										<tr>
												<td width="150">Komponen Layanan</td>
												<td>
														<select class="form-control" name="komponen_layanan" id="komponen_layanan">
																<option value="">Pilih Data</option>
																<?php
																$q1 = "SELECT id, deskripsi FROM $db.$table_komponen_layanan";
																$ex_q1 = mysqli_query($con, $q1);
																while($r1 = mysqli_fetch_assoc($ex_q1)){
																		$id = $r1['id'];
																		$deskripsi = $r1['deskripsi'];
																?>
																		<option value='<?php echo $id;?>' <?php if($id==$komponen_layanan) { echo "selected";} ?>><?php echo $deskripsi;?></option>
																<?php
																}
																?>
														</select>
												</td>
										</tr>
										<tr>
												<td width="150">Target Kelas</td>
												<td>
														<input type="checkbox" name="target_kelas[]" checked id="target_kelas" value="10"> <b>X</b> &nbsp;&nbsp;
														<input type="checkbox" name="target_kelas[]" checked id="target_kelas" value="11"> <b>XI</b> &nbsp;&nbsp;
														<input type="checkbox" name="target_kelas[]" checked id="target_kelas" value="12"> <b>XII</b> &nbsp;&nbsp;
												</td>
												<td width="5"></td>
										</tr>
										<tr>
												<td>Metode Layanan</td>
												<td>
														<button type="button" class="btn btn-info" onclick="getDataMetodeLayanan()">
																<span class="fa fa-plus-circle"></span> Pilih Metode Layanan
														</button>
														<textarea id="deskripsi_metode" rows="2" style="margin-top:10px"
															readonly><?php echo $deskripsi_metode_layanan;?></textarea>
														<input id="id_metode_layanan" value="<?php echo $metode_layanan;?>" name="id_metode_layanan" type="hidden">
												</td>
												<td></td>
										</tr>
										<tr>
												<td>Evaluasi</td>
												<td>
														<input required value="Proses dan hasil" class="form-control" placeholder="Masukan Evaluasi" name="evaluasi" id="evaluasi"></textarea>
												</td>
										</tr>
								</tbody>
						</table>
				</div>
		</div>
</div>
</form>
<style>
		.row{
				padding : 10px;
		}
</style>
