<table id="dg_metode_layanan"></table>

<script>
    $(function(){
        $('#dg_metode_layanan').datagrid({
            url : 'content/master_data_pertanyaan/master_data_metode_layanan.php',
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
