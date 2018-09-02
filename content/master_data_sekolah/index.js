$(function(){
    $('#tabel_sekolah').dataTable({
        "dom" : 'Bfrtip',
        "buttons" : ['excel','print'],
    });
});

function FormAddDataSekolah(){
    $('body').find('#form_add').remove();
    $('<div/>').attr('id','form_add').appendTo($('body')).dialog({
        href: 'content/master_data_sekolah/form_add.php',
        title: 'Tambah Data Sekolah',
        top : 20,
        width: 500,
        modal: true,
        buttons: [{
            text:'Simpan',
            iconCls:'icon-ok',
            handler:function(){
               prosesSimpanDataSekolah();
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

function prosesSimpanDataSekolah(){
    var nama = $('#nama').val();
    var alamat = $('#alamat').val();
    var no_telepon = $('#no_telepon').val();

    if(nama=="" || alamat=="" || no_telepon==""){
        $.messager.alert('Konfirmasi', 'Silahkan Lengkapi Data !!!');
        return;
    }

    $('#form_1').form('submit',{
        url : "content/__proses/simpan_data_sekolah.php",
        onSubmit:function(){
            return $(this).form('enableValidation').form('validate');
        },
        success : function (data){
            $('#form_add').dialog('close').dialog('destroy');
            console.log(data);
            getUrl();
        }
    });
}

function FormUpdateDataSekolah(value){
    $('body').find('#form_add').remove();
    $('<div/>').attr('id','form_add').appendTo($('body')).dialog({
        href: 'content/master_data_sekolah/form_add.php',
        title: 'Tambah Data Sekolah',
        top : 20,
        width: 500,
        modal: true,
        onBeforeLoad : function (){
          try {
              delete onLoad.form;
          } catch(e){}
        },
        onLoad : function (){
            var $this=$(this).find('form');
            try{
                $this.form('load',value);
                onLoad.form(value);
            }catch(e){}
        },
        buttons: [{
            text:'Update',
            iconCls:'icon-ok',
            handler:function(){
               prosesUpdateDataSekolah();
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

function prosesUpdateDataSekolah(){
    var nama = $('#nama').val();
    var alamat = $('#alamat').val();
    var no_telepon = $('#no_telepon').val();

    if(nama=="" || alamat=="" || no_telepon==""){
        $.messager.alert('Konfirmasi', 'Silahkan Lengkapi Data !!!');
        return;
    }

    $('#form_1').form('submit',{
        url : "content/__proses/update_data_sekolah.php",
        onSubmit:function(){
            return $(this).form('enableValidation').form('validate');
        },
        success : function (data){
            $('#form_add').dialog('close').dialog('destroy');
            console.log(data);
            getUrl();
        }
    });
}

function prosesDeleteDataSekolah(value){
    var nama = value.nama;
    var id = value.id;
    $.messager.confirm({
        title: 'Konfirmasi Hapus',
        msg: 'Anda Yakin Akan Mengahapus Data '+nama+' Ini ? ',
        fn: function(r){
            if (r){
                $.ajax({
                    type: "POST",
                    url: "content/__proses/hapus_data_sekolah.php",
                    data : "id="+id,
                    cache: false,
                    success: function(data){
                        $('#form_add').dialog('close').dialog('destroy');
                        console.log(data);
                        getUrl();
                    }
                });
            }
        }
    });
}
