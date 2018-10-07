<div class="panel panel-default panel-heading">
		<form method="post" action="javascript:void(0)" name="form_1" id="form_1" enctype="multipart/form-data">
				<table class="table table-striped table-hover">
						<tbody>
								<tr>
										<td width="150">Nama File</td>
										<td>
												<input required class="easyui-textbox" data-options="width:'100%'" placeholder="Masukan Nama File" name="nama_file" id="nama_file">
										</td>
										<td width="5"></td>
								</tr>
								<tr>
										<td>File</td>
										<td align="left" >
												<input class="easyui-filebox" id="file" name="file" data-options="width:'100%'">
										</td>
										<td width="5"></td>
								</tr>
						</tbody>
				</table>
		</form>
</div>

<script>
onLoad = {
		form:function (row){
				$('#form_1').append('<input type="hidden" id="id" name="id" value="'+row.id+'"/>');
		}
}
</script>
<style>
		.row{
				padding : 10px;
		}
</style>
