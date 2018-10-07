<div class="panel panel-default panel-heading">
		<form method="post" action="javascript:void(0)" name="form_1" id="form_1">
				<table class="table table-striped table-hover">
						<tbody>
								<tr>
										<td width="150">Subjek</td>
										<td>
                        <input required class="form-control" name="id" id="id" type="hidden">
												<input required class="form-control" name="subjek" id="subjek">
										</td>
								</tr>
								<tr>
										<td>Pesan</td>
										<td align="left" >
												<textarea required rows="3" name="pesan" alamat="pesan"></textarea>
										</td>
								</tr>
						</tbody>
				</table>
		</form>
</div>

<script>
    $(function(){
        setTimeout(function(){
            var id = $('#id').val();
            $.ajax({
                url : 'content/__proses/update_read_message.php',
                cache : false,
                data : { id : id},
                type : 'post',
            });
        },300);
    });
</script>
<style>
		.row{
				padding : 10px;
		}
</style>
