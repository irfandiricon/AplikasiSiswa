$(function(){
    $('#tabel_download').dataTable();
});

function FormAwal(){
    $('#panel-content').load('content/download/index.php');
}

function FormTambah(){
    $('body').find('#form_add').remove();
    $('<div/>').attr('id','form_add').appendTo($('body')).dialog({
        href: 'content/download/form_add.php',
        title: 'Tambah Data',
        top : 20,
        width: 500,
        modal: true,
        buttons: [{
            text:'Simpan',
            iconCls:'icon-ok',
            handler:function(){
               prosesSimpan();
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

function prosesSimpan(){
    $('#form_1').form('submit',{
        url : "content/__proses/simpan_data_download.php",
        onSubmit:function(){
            return $(this).form('enableValidation').form('validate');
        },
        success : function (data){
            //alert(data);
            $('#form_add').dialog('close').dialog('destroy');
            FormAwal();
        }
    });
}

function prosesDelete(value){
    var nama = value.nama;
    var id = value.id;
    var path_file = value.path_file;

    var data = {
        id : id,
        path_file : path_file
    }
    $.messager.confirm({
        title: 'Konfirmasi Hapus',
        msg: 'Anda Yakin Akan Mengahapus Data '+nama+' Ini ? ',
        fn: function(r){
            if (r){
                $.ajax({
                    type: "POST",
                    url: "content/__proses/hapus_data_download.php",
                    data : data,
                    cache: false,
                    success: function(data){
                        alert(data);
                        $('#form_add').dialog('close').dialog('destroy');
                        //console.log(data);
                        FormAwal();
                    }
                });
            }
        }
    });
}
