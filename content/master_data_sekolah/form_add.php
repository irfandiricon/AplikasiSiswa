<div class="panel panel-default panel-heading">
		<form method="post" action="javascript:void(0)" name="form_1" id="form_1">
				<table class="table table-striped table-hover">
						<tbody>
								<tr>
										<td width="150">Nama Sekolah</td>
										<td>
												<input required class="form-control" placeholder="Masukan Nama Sekolah" name="nama" id="nama">
										</td>
								</tr>
								<tr>
										<td>Alamat</td>
										<td align="left" >
												<textarea required rows="3" placeholder="Masukan alamat Sekolah" name="alamat" alamat="alamat"></textarea>
										</td>
								</tr>
								<tr>
										<td width="150">Nomor Telepon</td>
										<td>
												<input required class="form-control" placeholder="Masukan Nomor Telepon" name="no_telepon" id="no_telepon">
										</td>
								</tr>
						</tbody>
				</table>
		</form>
</div>

<script>
onLoad = {
		form:function (row){
				$('#form_1')
						.append('<input type="hidden" id="id" name="id" value="'+row.id+'"/>');
		}
}
</script>
<style>
		.row{
				padding : 10px;
		}
</style>
