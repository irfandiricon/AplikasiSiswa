$(function(){
    $('#tabel_guru').dataTable({
        "dom" : 'Bfrtip',
        "buttons" : ['excel','print']
    });
});


function FormAwal(){
    $('#panel-content').load('content/master_data_guru/index.php');
}

function FormUpdateDataGuru(user_id, status_aktif){
    var rows = {
        flag_aktif : status_aktif,
        user_id : user_id
    }

    $('body').find('#form_add').remove();
    $('<div/>').attr('id','form_add').appendTo($('body')).dialog({
        href: 'content/master_data_guru/form_add.php',
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
               prosesUpdateDataGuru();
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

function prosesUpdateDataGuru(){
    var user_id = $('#user_id').val();

    if(user_id==""){
        $.messager.alert('Konfirmasi', 'Silahkan Masukan Data !!!');
        return;
    }

    $('#form_1').form('submit',{
        url : "content/__proses/update_data_guru.php",
        onSubmit:function(){
            return $(this).form('enableValidation').form('validate');
        },
        success : function (data){
            $('#form_add').dialog('close').dialog('destroy');
            FormAwal();
        }
    });
}

function prosesDeleteDataGuru(user_id, nama_guru){
    var data = {
        user_id : user_id
    }
    $.messager.confirm({
        title: 'Konfirmasi Hapus',
        msg: 'Anda Yakin Akan Mengahapus Data <b>'+nama_guru+'</b> Ini ? ',
        fn: function(r){
            if (r){
                $.ajax({
                    type: "POST",
                    url: "content/__proses/hapus_data_guru.php",
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
