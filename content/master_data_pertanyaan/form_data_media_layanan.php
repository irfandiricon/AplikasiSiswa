<table id="dg_media_layanan"></table>

<script>
    $(function(){
        $('#dg_media_layanan').datagrid({
            url : 'content/master_data_pertanyaan/master_data_media_layanan.php',
            type : 'post',
            columns : [[
                {field:'chk',title:'',checkbox:true},
                {field:'deskripsi',title : 'Deskripsi',width:200,align:'left'}
            ]],
            fitColumns:true,
            onLoadSuccess : function(data){
                //alert(data);
            }
        });
    });
</script>
