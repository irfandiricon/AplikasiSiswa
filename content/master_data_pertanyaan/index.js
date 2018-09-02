$(function(){
    $('#tabel_pertanyaan').dataTable();
});
function FormAwal(){
    $('#panel-content').load('content/master_data_pertanyaan/index.php');
}
function FormAddDataPertanyaan(){
    $('#panel-content').load('content/master_data_pertanyaan/form_add.php');
}
function getDataMetodeLayanan(){
    $('body').find('#form_metode_layanan').remove();
    $('<div/>').attr('id','form_metode_layanan').appendTo($('body')).dialog({
        href: 'content/master_data_pertanyaan/form_data_metode_layanan.php',
        title: 'Data Metode Layanan',
        top : 20,
        width : 500,
        height : 500,
        modal : true,
        buttons : [{
            text:'Pilih Data',
            iconCls:'icon-save',
            handler:function(){
               getValueMetodeLayanan();
            }
        },{
            text:'Batal',
            iconCls:'icon-cancel',
            handler:function(){
                $('#form_metode_layanan').dialog('close').dialog('destroy');
            }
        }]
    });
}
function getDataMediaLayanan(){
    $('body').find('#form_media_layanan').remove();
    $('<div/>').attr('id','form_media_layanan').appendTo($('body')).dialog({
        href: 'content/master_data_pertanyaan/form_data_media_layanan.php',
        title: 'Data Media Layanan',
        top : 20,
        width : 500,
        height : 400,
        modal : true,
        buttons : [{
            text:'Pilih Data',
            iconCls:'icon-save',
            handler:function(){
               getValueMediaLayanan();
            }
        },{
            text:'Batal',
            iconCls:'icon-cancel',
            handler:function(){
                $('#form_media_layanan').dialog('close').dialog('destroy');
            }
        }]
    });
}
function getValueMetodeLayanan(){
    var rowSelected=$('#dg_metode_layanan').datagrid('getSelections') || {};
    var jumlah = rowSelected.length;
    var id = [];
    var deskripsi = [];
    for(var i=0; i<rowSelected.length; i++){
        id.push(rowSelected[i].id);
    }
    for(var i=0; i<rowSelected.length; i++){
        deskripsi.push(rowSelected[i].deskripsi);
    }
    $('#id_metode_layanan').val(id);
    $('#deskripsi_metode').val(deskripsi);
}

function getValueMediaLayanan(){
    var rowSelected=$('#dg_media_layanan').datagrid('getSelections') || {};
    var jumlah = rowSelected.length;
    var id = [];
    var deskripsi = [];
    for(var i=0; i<rowSelected.length; i++){
        id.push(rowSelected[i].id);
    }
    for(var i=0; i<rowSelected.length; i++){
        deskripsi.push(rowSelected[i].deskripsi);
    }
    $('#id_media_layanan').val(id);
    $('#deskripsi_media').val(deskripsi);
}

function SimpanDataPertanyaan(){
    var data = $('#form_1').serialize();
    $.ajax({
        url : "content/__proses/simpan_data_pertanyaan.php",
        cache : false,
        type : 'post',
        data : data,
        dataType : 'json',
        success : function(data){
            var isValid = data.isValid;
            var isPesan = data.isPesan;
            if(isValid==1){
                document.getElementById('btn_simpan').disabled = true;
                $('#pesan').html("<font size='4' color='green' ><b>"+isPesan+"</b></font>");
                setTimeout(function(){
                    FormAwal();
                },1000);
            }else{
                document.getElementById('btn_simpan').disabled = false;
                $('#pesan').html("<font size='4' color='red'><b>"+isPesan+"</b></font>");
                return;
            }
        }
    });
}

function UpdatePertanyaan(id){
    $('#panel-content').load('content/master_data_pertanyaan/form_add.php?id='+id);
}

function ProsesUpdateDataPertanyaan(){
    var data = $('#form_1').serialize();
    $.ajax({
        url : "content/__proses/update_data_pertanyaan.php",
        cache : false,
        type : 'post',
        data : data,
        dataType : 'json',
        success : function(data){
            var isValid = data.isValid;
            var isPesan = data.isPesan;
            if(isValid==1){
                document.getElementById('btn_update').disabled = true;
                $('#pesan').html("<font size='4' color='green' ><b>"+isPesan+"</b></font>");
                setTimeout(function(){
                    FormAwal();
                },1000);
            }else{
                document.getElementById('btn_update').disabled = false;
                $('#pesan').html("<font size='4' color='red'><b>"+isPesan+"</b></font>");
                return;
            }
        }
    });
}

function DeletePertanyaan(id,pertanyaan){
    var data = {
        id : id
    }
    $.messager.confirm({
        title: 'Notification',
        msg: 'Anda Yakin Akan Menghapus Data '+pertanyaan+' Ini?',
        fn: function(r){
            if (r){
                if (id==""){
                    alert('Silahkan Pilih Data !!!');
                }else{
                    $.ajax({
                        type: "POST",
                        url: "content/__proses/hapus_data_pertanyaan.php",
                        data: data,
                        cache: false,
                        success: function(data){
                            FormAwal();
                        }
                    });
                }
            }
        }
    });
}
