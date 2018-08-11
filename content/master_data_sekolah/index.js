$(function(){
    $('#tabel_sekolah').dataTable({
        dom : 'Bfrtip',
        buttons : ['excel','print']
    });
});

function TambahDataSekolah(){
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
               SimpanDataSekolah();
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

function SimpanDataSekolah(){
    var $this=$('a.menu-application.active');
    var isPath=$this.data('path');
    var class_name_array=$('a.menu-application').attr('class').replace('active').trim().split(' ');
    var url=class_name_array[class_name_array.length-1];

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
            $('#panel-content').load(isPath+'/'+url);

        }
    });
}

function FormTambahDataSekolah(){
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
               SimpanDataSekolah();
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
               UpdateDataSekolah();
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
