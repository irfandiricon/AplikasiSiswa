$(function(){
    $('#example23').dataTable();
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
               //simpanGroupMenu();
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
