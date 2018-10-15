<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");

include "../../../koneksi_db/Koneksi.php";
$table_pertanyaan = TABLE_PERTANYAAN;
$table_bidang_layanan = TABLE_BIDANG_LAYANAN;
$table_komponen_layanan = TABLE_KOMPONEN_LAYANAN;
$table_strategi_layanan = TABLE_STRATEGI_LAYANAN;
$table_metode_layanan = TABLE_METODE_LAYANAN;
$table_media_layanan = TABLE_MEDIA_LAYANAN;

$q = "SELECT
    b.deskripsi AS bidang_layanan, a.tujuan_layanan, c.deskripsi AS komponen_layanan, d.deskripsi AS strategi_layanan,
    a.materi_layanan,
    a.metode_layanan AS id_metode_layanan, a.media_layanan AS id_media_layanan, a.evaluasi
    FROM $db.$table_pertanyaan AS a
    LEFT JOIN $db.$table_bidang_layanan AS b ON b.id = a.bidang_layanan
    LEFT JOIN $db.$table_komponen_layanan AS c ON c.id = a.komponen_layanan
    LEFT JOIN $db.$table_strategi_layanan AS d ON d.id = a.strategi_layanan";
$ex = mysqli_query($con, $q);
?>

<table border='3' style="padding:5px;">
				<tr>
						<td width="20"><b>No</b></td>
						<td width="120"><b>Bidang Layanan</b></td>
						<td width="200"><b>Tujuan Layanan</b></td>
						<td width="150"><b>Komponen Layanan</b></td>
						<td width="150"><b>Strategi Layanan</b></td>
						<td width="250"><b>Materi</b></td>
						<td width="150"><b>Metode</b></td>
						<td width="150"><b>Media</b></td>
						<td width="150"><b>Evaluasi</b></td>
				</tr>
				<?php
				$no=1;
				while($row = mysqli_fetch_assoc($ex)){
						$bidang_layanan = $row['bidang_layanan'];
						$tujuan_layanan = $row['tujuan_layanan'];
						$komponen_layanan= $row['komponen_layanan'];
						$strategi_layanan = $row['strategi_layanan'];
						$materi_layanan = $row['materi_layanan'];
						$id_metode_layanan = $row['id_metode_layanan'];
						$id_media_layanan = $row['id_media_layanan'];
						$evaluasi = $row['evaluasi'];

						$q1 = "SELECT GROUP_CONCAT(deskripsi) as deskripsi FROM $db.$table_metode_layanan where id IN ($id_metode_layanan)";
						$ex_q1 = mysqli_query($con, $q1);
						$r1 = mysqli_fetch_assoc($ex_q1);
						$metode_layanan = $r1['deskripsi'];

						$q2 = "SELECT GROUP_CONCAT(deskripsi) as deskripsi FROM $db.$table_media_layanan where id IN ($id_media_layanan)";
						$ex_q2 = mysqli_query($con, $q2);
						$r2 = mysqli_fetch_assoc($ex_q2);
						$media_layanan = $r2['deskripsi'];
				?>
				<tr>
						<td><?php echo $no++;?></td>
						<td><?php echo $bidang_layanan;?></td>
						<td><?php echo $tujuan_layanan;?></td>
						<td><?php echo $komponen_layanan;?></td>
						<td><?php echo $strategi_layanan;?></td>
						<td><?php echo $materi_layanan;?></td>
						<td><?php echo $metode_layanan;?></td>
						<td><?php echo $media_layanan;?></td>
						<td><?php echo $evaluasi;?></td>
				</tr>
				<?php
				}
				?>
</table>
