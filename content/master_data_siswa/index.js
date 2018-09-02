$(function(){
    $('#tabel_siswa').dataTable({
        "dom" : 'Bfrtip',
        "buttons" : ['excel','print'],
    });
});

function FormAwal(){
    $('#panel-content').load('content/master_data_siswa/index.php');
}

function FormUpdateDataSiswa(user_id, status_aktif){
    var rows = {
        flag_aktif : status_aktif,
        user_id : user_id
    }

    $('body').find('#form_add').remove();
    $('<div/>').attr('id','form_add').appendTo($('body')).dialog({
        href: 'content/master_data_siswa/form_add.php',
        title: 'Update Data Siswa',
        top : 20,
        width: 400,
        modal: true,
        onLoad : function (){
            var $this=$(this).find('form');
            try{
                $this.form('load',rows);
            }catch(e){}
        },
        buttons: [{
            text:'Update',
            iconCls:'icon-ok',
            handler:function(){
               prosesUpdateDataSiswa();
            }
        },{
            text:'Batal',
            iconCls:'icon-cancel',
            handler:function(){
                $('#form_add').dialog('close').dialog('destroy');
            }
        }]
    });
}

function prosesUpdateDataSiswa(){
    var user_id = $('#user_id').val();

    if(user_id==""){
        $.messager.alert('Konfirmasi', 'Silahkan Masukan Data !!!');
        return;
    }

    $('#form_1').form('submit',{
        url : "content/__proses/update_data_siswa.php",
        onSubmit:function(){
            return $(this).form('enableValidation').form('validate');
        },
        success : function (data){
            $('#form_add').dialog('close').dialog('destroy');
            FormAwal();
        }
    });
}

function prosesDeleteDataSiswa(user_id, nama_siswa){
    var data = {
        user_id : user_id
    }
    $.messager.confirm({
        title: 'Konfirmasi Hapus',
        msg: 'Anda Yakin Akan Mengahapus Data <b>'+nama_siswa+'</b> Ini ? ',
        fn: function(r){
            if (r){
                $.ajax({
                    type: "POST",
                    url: "content/__proses/hapus_data_siswa.php",
                    data : data,
                    cache: false,
                    success: function(data){
                        FormAwal();
                    }
                });
            }
        }
    });
}
