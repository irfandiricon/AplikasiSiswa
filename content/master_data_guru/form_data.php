<form method="post" name="formData" id="formData" action="javascript:void(0)">
    <table class="table table-striped table-hover">
        <tr>
             <th><b>Status</b></th>
        </tr>
        <tr>
            <td><input name="flag_aktif" id="flag_aktif" style="width:100%"></td>
        </tr>
    </table>
</form>
<script>
    var onLoad = {
        form : function(data){
            $('#formData').append('<input type="hidden" name="user_id_login" id="user_id_login" value="'+data.user_id_login+'">');
        }
    }

    $(function(){
        $('#flag_aktif').val('Y').combobox({
            textField : 'deskripsi',
            valueField : 'id',
            panelHeight : 'auto',
            data : [
                {id : 'Y', deskripsi : 'Aktif'},
                {id : 'N', deskripsi : 'Non Aktif'}
            ]
        });
    });
</script>
