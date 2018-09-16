<div class="panel panel-default panel-heading">
		<form method="post" action="javascript:void(0)" name="form_1" id="form_1">
				<table class="table table-striped table-hover">
						<tbody>
							<tr>
									<td width="130">Kelas</td>
									<td>
											<input id="user_id" name="user_id" type="hidden">
											<input class="easyui-combobox" name="kelas" id="kelas"
												data-options="
														width:'100%',
														url:'content/master/master_data_kelas.php',
														valueField : 'id',
														textField : 'deskripsi',
														panelHeight : 'auto'" >
									</td>
							</tr>
								<tr>
										<td width="130">Status Aktif</td>
										<td>
												<input class="easyui-combobox" name="flag_aktif" id="flag_aktif"
													data-options="
															width:'100%',
															url:'content/master/master_data_flag_aktif.php',
															valueField : 'id',
															textField : 'deskripsi',
															panelHeight : 'auto'
													" >
										</td>
								</tr>
						</tbody>
				</table>
		</form>
</div>

<style>
		.row{
				padding : 10px;
		}
</style>
