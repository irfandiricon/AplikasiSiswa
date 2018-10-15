$(function(){
    $('#table_action_plan').dataTable({
        "dom" : 'Bfrtip',
        "buttons" : ['excel','pdf','print'],
    });
});

function DownloadTabelRpl(){
    window.open('content/halaman_program_kerja/data_action_plan/table_rpl.php');
}
