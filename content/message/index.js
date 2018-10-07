$(function(){
    $('#tabel_pesan').dataTable({
        "dom" : 'Bfrtip',
        "buttons" : ['excel','print'],
    });
});

function FormAwal(){
    $('#panel-content').load('content/message/index.php');
}

function prosesDelete(id, subjek){
    var data = {
        id : id
    }
    $.messager.confirm({
        title: 'Konfirmasi Hapus',
        msg: 'Anda Yakin Akan Mengahapus Data <b>'+subjek+'</b> Ini ? ',
        fn: function(r){
            if (r){
                $.ajax({
                    type: "POST",
                    url: "content/__proses/hapus_data_pesan.php",
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

function FormView(id, subjek, pesan){
    var data = {
        id : id,
        subjek : subjek,
        pesan : pesan
    }
    $('body').find('#form_view').remove();
    $('<div/>').attr('id','form_view').appendTo($('body')).dialog({
        href: 'content/message/form_view.php',
        title: 'Pesan',
        top : 20,
        width: 400,
        queryParams : data,
        modal: true,
        onLoad : function (){
            var $this=$(this).find('form');
            try{
                $this.form('load',data);
            }catch(e){}
        },
        buttons: [{
            text:'Tutup',
            iconCls:'icon-cancel',
            handler:function(){
                $('#form_view').dialog('close').dialog('destroy');
                FormAwal();
            }
        }]
    });
}
