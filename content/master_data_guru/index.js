$(function(){
    var hTbl = parseInt($(window).innerHeight()) - parseInt($('.header').height()) - parseInt($('.footer').height()) - 120;
    $('#dg').datagrid({
        title : 'DATA GURU',
        fitColumns : true,
        url : 'content/master/master_data_guru.php',
        height : hTbl,
        method:'post',
        rownumbers:true,
        singleSelect : false,
        columns:[[
            {field:'ck',checkbox:true},
            {field:'nip',title:'<span style="font-weight:bold">NIP</span>',width : 120,sortable:true},
            {field:'nama_lengkap',title:'<span style="font-weight:bold">NAMA LENGKAP</span>',width : 200,sortable:true},
            {field:'tgl_lahir',title:'<span style="font-weight:bold">TEMPAT & TGL LAHIR</span>',width : 200,sortable:true},
            {field:'jenis_kelamin',title:'<span style="font-weight:bold">JK</span>',width : 80,sortable:true},
            {field:'nama_sekolah',title:'<span style="font-weight:bold">NAMA SEKOLAH</span>',width : 250,sortable:true},
            {field:'flag_aktif',title:'<span style="font-weight:bold">STATUS</span>',width : 100,sortable:true,align:'left'},
        ]],
        striped : true,
        pagination:true,
        pageSize:20,
        onClickRow : function(){
            $('#btn_status').linkbutton('enable',true);
            $('#btn_delete').linkbutton('enable',true);
        },
        toolbar : [{
            text:'Set Status',
            iconCls:'icon-edit',
            id:'btn_status',
            disabled:true,
            handler:function(){
                form_set_status();
            }
        },{
            text:'Delete',
            iconCls:'icon-remove',
            id:'btn_delete',
            disabled:true,
            handler:function(){
                prosesDelete();
            }
        },],
        onLoadSuccess : function(data){
            //console.log(JSON.stringify(data));
        }
    });

    $classToolbarGrid = $('.datagrid-toolbar table tbody tr');

    $classToolbarGrid.find('td').css('display','inline-block');
    $classToolbarGrid.parent().parent().css('width','100%');
    $('<td><label>Kata Kunci</label>&nbsp;&nbsp;&nbsp;<input id="keyword" name="keyword"></td>')
    .css({'float' : 'right','display':'inline-block','padding-left':'.5em'}).appendTo($classToolbarGrid);

    $('#keyword').searchbox({
        searcher : doSearch,
        prompt : "Masukan NIP / Nama Guru/ Nama Sekolah",
        width : "250",
    });
});

function doSearch(){
    var keyword = $('#keyword').searchbox('getValue');
    var data = {
        keyword : keyword
    }
    $('#dg').datagrid('load',data);
}

function form_set_status(){
    var rows = $('#dg').datagrid('getSelections') || {};
    var user_id_login = [];
    for(var i=0; i<rows.length; i++){
        user_id_login.push(rows[i].user_id_login);
    }

    if(user_id_login==""){
        $.messager.alert('Informasi','SILAHKAN PILIH DATA !!!');
        return;
    }
    var data = {
        user_id_login : user_id_login
    }

    $('body').find('#form_data').remove();
    $('<div/>').attr('id','form_data').appendTo($('body')).dialog({
        href : 'content/master_data_guru/form_data.php',
        width : 400,
        height : 'auto',
        top : 50,
        onBeforeLoad : function (){
          try {
              delete onLoad.form;
          } catch(e){}
        },
        onLoad : function (){
            try{
                onLoad.form(data);
            }catch(e){}
        },
        position : 'center',
        title : "Form Set Status",
        modal:true,
        method : 'POST',
        buttons: [{
            text:'Save',
            iconCls:'icon-save',
            handler:function(){
                prosesSimpan();
            }
        },{
            text:'Close',
            iconCls:'icon-cancel',
            id : "btn_close",
            handler:function(){
                $('#form_data').dialog('close').dialog('destroy');
            }
        }]
    });
}

function prosesSimpan(){
    $('#formData').form('submit',{
        url : "content/__proses/update_data_guru.php",
        onSubmit:function(){
            return $(this).form('enableValidation').form('validate');
        },
        success : function (data){
            $.messager.alert('Info',data);
            $('#form_data').dialog('close').dialog('destroy');
            $('#dg').datagrid('load');
        }
    });
}

function prosesDelete(){
    var rows = $('#dg').datagrid('getSelections') || {};
    var user_id_login = [];
    for(var i=0; i<rows.length; i++){
        user_id_login.push(rows[i].user_id_login);
    }

    if(user_id_login==""){
        $.messager.alert('Informasi','SILAHKAN PILIH DATA !!!');
        return;
    }
    var data = {
        user_id_login : user_id_login
    }

    $.messager.confirm({
        title: 'Konfirmasi',
        msg: "Anda Yakin Akan Menghapus Data ?",
        fn: function(r){
            if (r){
                data = {
                    user_id_login : user_id_login
                }
                $.ajax({
                    type: "POST",
                    url: "content/__proses/hapus_data_guru.php",
                    data: data,
                    cache: false,
                    dataType : 'json',
                    success: function(result){
                        $.messager.alert('Information', result);
                        $('#dg').datagrid('reload');
                    }
                });
            }
        }
    });
}
