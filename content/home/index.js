$(function(){
    $('#tabel_berita').dataTable();
});

function FormAwal(){
    $('#panel-content').load('content/home/index.php');
}
function FormAdd(){
    $('#panel-content').load('content/home/form_add.php');
}
function FormUpdate(data){
    $('#panel-content').load('content/home/form_add.php',data);
}

function ProsesSimpanData(){
    $('#form_1').form('submit',{
        url : "content/__proses/simpan_data_berita.php",
        onSubmit:function(){
            return $(this).form('enableValidation').form('validate');
        },
        success : function (data){
            $('#form_add').dialog('close').dialog('destroy');
            alert(data);
            FormAwal();
        }
    });
}

function prosesDeleteData(value){
    var nama = value.judul;
    var id = value.id;
    $.messager.confirm({
        title: 'Konfirmasi Hapus',
        msg: 'Anda Yakin Akan Mengahapus Data '+nama+' Ini ? ',
        fn: function(r){
            if (r){
                $.ajax({
                    type: "POST",
                    url: "content/__proses/hapus_data_berita.php",
                    data : "id="+id,
                    cache: false,
                    success: function(data){
                        $('#form_add').dialog('close').dialog('destroy');
                        FormAwal();
                    }
                });
            }
        }
    });
}
