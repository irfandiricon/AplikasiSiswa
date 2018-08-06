<script src="setting/app_access/index.js"></script>
<div id="dg_toolbar_keywoard" style="padding:5px;">
    <table cellpadding="0" cellspacing="0" style="width:100%">
        <tr>
            <td align="right">
                <label><b>Area Kerja</b></label>&nbsp;&nbsp;&nbsp;
                <input id="parameter_area_kerja" name="parameter_area_kerja">
                &nbsp;&nbsp;
                <label><b>Kata Pencarian</b></label>&nbsp;&nbsp;&nbsp;
                <input id="parameter_keywoard" name="parameter_keywoard">
            </td>
        </tr>
    </table>
</div>
<table id="dg_access_menu" data-options="fitColumns:true"></table>

<script type="text/javascript">
    $(function(){
        $('#parameter_area_kerja').combobox({
            url:'setting/master/master_data_kantor.php',
            panelHeight:'auto',
            width:200,
            height:30,
            valueField:'kode_kantor',
            textField:'nama_kantor',
            method : 'POST',
            queryParams : {
                addSemua : '1'
            },
            onChange : function (){
                doSearch();
            }
        });

        $('#parameter_keywoard').searchbox({
            prompt:'Masukan Kata Pencarian',
            searcher:doSearch,
            width:200,
            height:30,
        });
    });
</script>
